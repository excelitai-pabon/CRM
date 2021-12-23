@extends('master.master')
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

<style>
@media print{
 .printb{
     display: none;
 }
}

</style>


@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card printb">
            <div class="card-body">
                <form action="@if (Auth::guard('super_admin')->check()) {{ route('super_admin.monthly_report') }}
                    @elseif(Auth::guard('admin')->check()) {{ route('admin.monthly_report')}} @endif" autocomplete="off">
                    <div class="mb-4">
                        <label class="form-label">Search Range</label>
                        <div class="row">
                            <div class="col-lg-8">

                                <div class="form-group">
                                    <input type="text" id="datepickerYear2" class="form-control" name="month" >
                                </div>

                            </div>

                            @auth('super_admin')
                                <div class="col-lg-8 mt-3">

                                    <div class="form-group">
                                        <select class="form-select" name="crm" aria-label="Default select example">
                                            <option value="" selected>Select any specfic CRM</option>
                                            <option value="all">All Together</option>
                                            @foreach ($crms as $crm)
                                                <option value="{{$crm->id}}">{{$crm->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            @endauth


                            <div class="col-lg-4">
                                <button class="btn btn-primary" type="submit" name="search"> Search </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Monthly  Report</h4>
                <p class="card-title-desc">Here you can see daily report of user.</p>

                <div class="table-responsive">

                    <table class="table table-bordered table-striped  mb-0">

                        <thead class="bg-dark text-white">
                            <tr>
                                <th>File No</th>
                                <th>Basic Information</th>
                                <th>Paid Amount</th>
                                <th>Paid Date</th>
                                <th>Due Amount</th>
                                <th>Due Date</th>

                            </tr>
                        </thead>
                        <tbody>


                            @if(isset($booking_status))

                            @foreach($booking_status as $item)
                            <tr>
                                <th>{{optional($item->user)->file_no}}</th>
                                <td>Booking Money</td>
                                <td>{{$item->booking_money_paid}}</td>
                                <td>{{$item->booking_money_paid_date}}</td>
                                <td>{{$item->booking_money_due}}</td>
                                <td>{{$item->booking_money_due_date}}</td>
                            </tr>

                            @endforeach

                            @endif

                            @if(isset($down_payment))
                                @foreach($down_payment as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Down Payment </td>
                                    <td>{{$item->downpayment_money_paid}}</td>
                                    <td>{{$item->downpayment_money_paid_date}}</td>
                                    <td>{{$item->downpayment_money_due}}</td>
                                    <td>{{$item->downpayment_money_due_date}}</td>
                                </tr>

                                @endforeach


                            @endif

                            @if(isset($car_parking))
                                @foreach($car_parking as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Car parking </td>
                                    <td>{{$item->car_parking_money_paid}}</td>
                                    <td>{{$item->car_parking_money_paid_date}}</td>
                                    <td>{{$item->car_parking_money_due}}</td>
                                    <td>{{$item->car_parking_money_due_date}}</td>
                                </tr>

                                @endforeach


                            @endif

                            @if(isset($land_filling_1st))
                            @foreach($land_filling_1st as $item)
                            <tr>
                                <th>{{optional($item->user)->file_no}}</th>
                                <td>Land Filling 1st </td>
                                <td>{{$item->land_filling_money_paid}}</td>
                                <td>{{$item->land_filling_money_paid_date}}</td>
                                <td>{{$item->land_filling_money_due}}</td>
                                <td>{{$item->land_filling_money_due_date}}</td>
                            </tr>

                            @endforeach


                            @endif

                            @if(isset($land_filling_2nd))
                                @foreach($land_filling_2nd as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Land Filling 2nd </td>
                                    <td>{{$item->land_filling_money_paid}}</td>
                                    <td>{{$item->land_filling_money_paid_date}}</td>
                                    <td>{{$item->land_filling_money_due}}</td>
                                    <td>{{$item->land_filling_money_due_date}}</td>
                                </tr>

                                @endforeach


                            @endif

                            @if(isset($building_pilling))
                                @foreach($building_pilling as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Building Pilling </td>
                                    <td>{{$item->building_pilling_money_paid}}</td>
                                    <td>{{$item->building_pilling_money_paid_date}}</td>
                                    <td>{{$item->building_pilling_money_due}}</td>
                                    <td>{{$item->building_pilling_money_due_date}}</td>
                                </tr>

                                @endforeach


                            @endif

                            @if(isset($first_floor))
                                @foreach($first_floor as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Floor Roof Casting </td>
                                    <td>{{$item->floor_roof_casting_money_paid_1st}}</td>
                                    <td>{{$item->floor_roof_casting_money_paid_date_1st}}</td>
                                    <td>{{$item->floor_roof_casting_money_due_1st}}</td>
                                    <td>{{$item->floor_roof_casting_money_paid_date_1st}}</td>
                                </tr>

                                @endforeach

                            @endif

                            @if(isset($finishing_money))
                                @foreach($finishing_money as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Finishing Work </td>
                                    <td>{{$item->finishing_work_money_paid}}</td>
                                    <td>{{$item->finishing_work_money_paid_date}}</td>
                                    <td>{{$item->finishing_work_money_due}}</td>
                                    <td>{{$item->finishing_work_money_due_date}}</td>
                                </tr>

                                @endforeach

                            @endif

                            @if(isset($after_handover_money))
                                @foreach($after_handover_money as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Ater handover </td>
                                    <td>{{$item->after_handover_money_money_paid}}</td>
                                    <td>{{$item->after_handover_money_paid_date}}</td>
                                    <td>{{$item->after_handover_money_money_due}}</td>
                                    <td>{{$item->after_handover_money_due_date}}</td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                    <td><h4 class="text-success ">{{$totalPaidAmount}}</h4></td>
                                    <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                    <td><h4 class="text-danger">{{$totalPaidAmount_due}}</h4></td>
                                    <td></td>
                                </tr>

                            @endif

                        </tbody>
                    </table>

                    <a class="btn btn-primary px-4 mt-3 printb" href="javaScript:void(0)" onclick="window.print();"><i class="fas fa-download"></i> Print </a>


                </div>

            </div>
        </div>
    </div>


</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>
<script>

    //select only Year
    $("#datepickerYear2").datepicker({
        format: "dd-mm-yyyy",
        viewMode: "years",
        minViewMode: "months",
        autoclose:true
    });

</script>
@endsection
