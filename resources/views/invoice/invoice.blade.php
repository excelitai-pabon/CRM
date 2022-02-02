@extends('master.master')
@section('content')
            <h2 style="align:center">Invoice Statement</h2>
<div class="container-fluid" id="status_field">
    <form action="@if (Auth::guard('super_admin')->check()) {{ route('super_admin.custom.pdf.post') }}
        @elseif(Auth::guard('admin')->check()){{route('admin.custom.pdf.post')}} @endif" method="POST">
        <input type="text" name= "user_id" hidden value="{{$installments->id}}">
        @csrf
        <div class="row">
            <div class="col-6" id="status_content">
                <div class="row  row0 mt-3">
                    <div class="col-4">
                        <select name="status[0]" class="form-control col-4 check_status" id="select0">
                            <option value="" disabled selected>Select a basic amount</option>
                            <option value="after_handover_money"> After Handover Money</option>
                            <option value="booking_status">Booking Status</option>
                            <option value="building_pilling_status">Building Pilling Status</option>
                            <option value="down_payment_status">Down Payment Status</option>
                            <option value="finishing_work_status">Finishing Work Status</option>
                            <option value="floor_roof_casting1st">Floor Roof Casting 1</option>
                            <option value="land_filling_status_1">Land filling status 1</option>
                            <option value="land_filling_status_2">Land filling status 2</option>
                            <option value="registrationpayment_money">Registrationpayment Money</option>
                            <option value="car_parking">Car Parking</option>
                            <option value="khajna">Khajna Money</option>
                        </select>
                    </div>

                    <div class="col-8">
                        <input type="button" name="submit" id="add_more" class="btn btn-warning col-3" value="Add More"/>
                    </div>
                </div>
            </div>
            <div class="col-6" id="installment_container">
                <div class="row mt-3" id="installment1" >
                    <div class="col-4 mt-2" id="installment_select">
                        <select class="form-control col-4 check_installment" id="installment" name="installment[]">
                            <option value="" disabled selected>Select a basic amount</option>

                            @foreach ($installments->installment as $data)
                                <option value="{{$data->id}}"> Installment {{$data->installment_no}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-8">
                        <input type="button" name="add_installment" id="add_installment" class="btn btn-warning col-3 mt-2" value="Add More"/>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info mt-4">Submit</button>
    </form>
</div>
<script>


var i=1;
$("#add_more").on('click',function()
{
    var s = `<div class="row  row${i} mt-3">
                <div class="col-8">
                    <select name="status[${i}]" class="form-control col-4 check_status" id="select${i}">
                        <option value="" disabled selected>Select a basic amount</option>
                        <option value="after_handover_money"> After Handover Money</option>
                        <option value="booking_status">Booking Status</option>
                        <option value="building_pilling_status">Building Pilling Status</option>
                        <option value="down_payment_status">Down Payment Status</option>
                        <option value="finishing_work_status">Finishing Work Status</option>
                        <option value="floor_roof_casting1st">Floor Roof Casting 1</option>
                        <option value="land_filling_status_1">Land filling status 1</option>
                        <option value="land_filling_status_2">Land filling status 2</option>
                        <option value="registrationpayment_money">Registrationpayment Money</option>
                        <option value="car_parking">Car Parking</option>
                        <option value="khajna">Khajna Money</option>
                    </select>
                </div>
                <div class="col-4">
                    <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">&times;</button>
                </div>
            </div>`;
    $("#status_content").append(s);
    i++;
});
$(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id");
    $('.row'+button_id).remove();
});
$(document).on('change','.check_status',function()
{
    var value = $(this).val();
    console.log(value,this);
    var current = $(this);
    $(this).attr('name', `status[${value}]`);
    var check_status = $('.check_status');
    $.each(check_status, function( key, data ) {
        var element = $(data);
        if(element.val()==value &&  (element.attr('id') !== current.attr('id')))
        {
            console.log('find same');
            console.log(element,current);
            // $(element option:selected).attr("disabled", true);
            $(current).children("option:selected").attr("disabled", true);
        }
        else{
            console.log('not same');
        }
    });
});
</script>


<script>
    var installment_counter = 2;
    $('#add_installment').on('click',function()
    {
        var s = $('#installment_select').clone();
        var b = `<div class="col-4">
                    <button type="button" id="${installment_counter}" name="installment_remove" class="btn btn-danger installment_remove">&times;</button>
                </div>`;

        var r = `<div class="row mt-3" id="installment${installment_counter}" > </div>`;

        var selection = 'installment'+installment_counter;
        installment_counter++;

        var row = $('#installment_container').append(r);

        var test = $(`#${selection}`).append(s);
        var test2 = $(`#${selection}`).append(b);
        console.log(row);

    })

    $(document).on('change','.check_installment',function()
    {
        var value = $(this).val();
        console.log(value,this);
        var current = $(this);
        $(this).attr('name', `installment[${value}]`);

    });


    $(document).on('click','.installment_remove',function()
    {
            var button_id = $(this).attr("id");
            $('#installment'+button_id).remove();
    });
</script>

@endsection
