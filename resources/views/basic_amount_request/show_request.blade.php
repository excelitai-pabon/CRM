@extends('master.master')

@section('content')

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">DATA</th>


                  </tr>
                </thead>

                <tbody class="user_table">








                  <tr>
                    <td >Booking Money
                    </td>
                      <td id="booking_money">

                      </td>
                  </tr>
                  <tr>
                    <td>Booking money pyment type
                    </td>
                      <td id="booking_money_payment_type">
                     </td>
                </tr>
                <tr>
                    <td>Booking money paid
                    </td>

                    <td id="booking_money_paid">
                  </td>
                </tr>
                <tr>
                    <td>Booking money due
                    </td>
                    <td id="booking_money_due">
                   </td>
                </tr>
                <tr>
                    <td>Booking money paid date
                    </td>
                    <td id="booking_money_paid_date">
                   </td >
                </tr>
                <tr>
                    <td>Booking Money Due date
                    </td>
                    <td id="booking_money_due_date">
                    </td>
                </tr>

                    <tr>
                        <td>Booking Money Note

                        </td>
                        <td id="booking_money_note">

                        </td>
                  </tr>

                  <tr>
                    <td>building_pilling_money

                    </td>
                    <td id="building_pilling_money">

                    </td>
              </tr>
                  <tr>
                    <td>building_pilling_money_due

                    </td>
                    <td id="building_pilling_money_due">

                    </td>
              </tr>
                  <tr>
                    <td>building_pilling_money_due_date

                    </td>
                    <td id="building_pilling_money_due_date">

                    </td>
              </tr>
                  <tr>
                    <td>building_pilling_money_note

                    </td>
                    <td id="building_pilling_money_note">

                    </td>
              </tr>
                  <tr>
                    <td>building_pilling_money_paid

                    </td>
                    <td id="building_pilling_money_paid">

                    </td>
              </tr>
                  <tr>
                    <td>building_pilling_money_due

                    </td>
                    <td id="building_pilling_money_paid_date">

                    </td>
                    </tr>
                  <tr>
                    <td>building_pilling_money_paid_date

                    </td>
                    <td id="building_pilling_money_paid_date">

                    </td>
                    </tr>
                  <tr>
                    <td>building_pilling_money_paid_date

                    </td>
                    <td id="building_pilling_money_paid_date">

                    </td>
                    </tr>

                    <tr>
                      <td>car_parking_money

                      </td>
                      <td id="car_parking_money">

                      </td>
                      </tr>
                    <tr>
                      <td>car_parking_money_due

                      </td>
                      <td id="car_parking_money_due">

                      </td>
                      </tr>
                    <tr>
                      <td>car_parking_money_due_date

                      </td>
                      <td id="car_parking_money_due_date">

                      </td>
                      </tr>
                    <tr>
                      <td>car_parking_money_due

                      </td>
                      <td id="car_parking_money_due">

                      </td>
                      </tr>
                    <tr>
                      <td>car_parking_money_note

                      </td>
                      <td id="car_parking_money_note">

                      </td>
                      </tr>
                    <tr>
                      <td>car_parking_money_paid_date

                      </td>
                      <td id="car_parking_money_paid_date">

                      </td>
                      </tr>
                    <tr>
                      <td>car_parking_money_paid_date

                      </td>
                      <td id="car_parking_money_paid_date">

                      </td>
                      </tr>


                    <tr>
                      <td>downpayment_money

                      </td>
                      <td id="downpayment_money">

                      </td>
                      </tr>
                    <tr>
                      <td>downpayment_money_due

                      </td>
                      <td id="downpayment_money_due">

                      </td>
                      </tr>
                    <tr>
                      <td>downpayment_money_due_date

                      </td>
                      <td id="downpayment_money_due_date">

                      </td>
                      </tr>
                    <tr>
                      <td>downpayment_money_note

                      </td>
                      <td id="downpayment_money_note">

                      </td>
                      </tr>
                    <tr>
                      <td>downpayment_money_paid

                      </td>
                      <td id="downpayment_money_paid">

                      </td>
                      </tr>
                    <tr>
                      <td>downpayment_money_payment_type

                      </td>
                      <td id="downpayment_money_payment_type">

                      </td>
                      </tr>


                    <tr>
                      <td>finishing_work_money

                      </td>
                      <td id="finishing_work_money">

                      </td>
                      </tr>
                    <tr>
                      <td>finishing_work_money_due_date

                      </td>
                      <td id="finishing_work_money_due_date">

                      </td>
                      </tr>
                    <tr>
                      <td>finishing_work_money_note

                      </td>
                      <td id="finishing_work_money_note">

                      </td>
                      </tr>
                    <tr>
                      <td>finishing_work_money_paid

                      </td>
                      <td id="finishing_work_money_paid">

                      </td>
                      </tr>
                    <tr>
                      <td>finishing_work_money_paid_date

                      </td>
                      <td id="finishing_work_money_paid_date">

                      </td>
                      </tr>
                    <tr>
                      <td>finishing_work_money_payment_type

                      </td>
                      <td id="finishing_work_money_payment_type">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_1

                      </td>
                      <td id="land_filling_money_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_due_1

                      </td>
                      <td id="land_filling_money_due_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_due_date_1

                      </td>
                      <td id="land_filling_money_due_date_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_note_1

                      </td>
                      <td id="land_filling_money_note_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_due_date_1

                      </td>
                      <td id="land_filling_money_due_date_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_paid_date_1

                      </td>
                      <td id="land_filling_money_paid_date_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_paid_1

                      </td>
                      <td id="land_filling_money_paid_1">

                      </td>
                      </tr>
                    <tr>
                      <td>land_filling_money_payment_type_1

                      </td>
                      <td id="land_filling_money_payment_type_1">

                      </td>
                      </tr>






                    <tr>
                        <td>
                        land_filling_money_2
                      </td>
                      <td id="land_filling_money_2">

                      </td>
                      </tr>


                    <tr>
                        <td>
                        land_filling_money_due_2
                      </td>
                      <td id="land_filling_money_due_2">

                      </td>
                      </tr>
                    <tr>
                         <td>
                        land_filling_money_due_date_2
                      </td>
                      <td id="land_filling_money_due_date_2">

                      </td>
                      </tr>
                    <tr> <td>
                        land_filling_money_note_2
                      </td>
                      <td id="land_filling_money_note_2">

                      </td>
                      </tr>
                    <tr> <td>
                        land_filling_money_paid_date_2
                      </td>
                      <td id="land_filling_money_paid_date_2">

                      </td>
                      </tr>
                    <tr> <td>
                        land_filling_money_payment_type_2
                      </td>
                      <td id="land_filling_money_payment_type_2">

                      </td>
                      </tr>


                </tbody>


              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table head</h4>
                <p class="card-title-desc">

                <div class="table-responsive">
                    <table class="table mb-0">


                                <thead>
                                    <tr>
                                        <th>ar</th>
                                        <th>User Name</th>
                                        <th>UserId</th>

                                        <th> status</th>




                                        <th colspan="3" class="text-end">Action</th>


                                    </tr>
                                </thead>

                                <tbody class="main_table">
                                    @foreach ($update_request as $req)



                                    <tr>

                                        <td>1</td>
                                        <td>name</td>
                                        <td>{{$req->user_id}}</td>


                                        @if ($req->approve_status!=0)
                                        <td><button disabled type="button" class="btn btn-success">Approved</button></td>
                                        @else

                                        <td><button disabled type="button" class="btn btn-danger">Pending</button></td>

                                         @endif









                                        <td class="text-end">

                                         {{-- @if ($list->approve_status!=1) --}}

                                    {{-- @endif --}}
                                    <a href="{{route('super_admin.basic.destroy',$req->user_id)}}" id="delete" class="btn btn-danger">Delete</a>
                                    <a href="{{route('getData',$req->user_id)}}"  id="mybtn" class="show_data btn btn-primary mybtn"  data-value="{{$req->user_id}}">
                                        View
                                    </a>

                                    {{-- @if ($list->approve_status!=1) --}}

                                      <a href="{{route('super_admin.basic.approve.store',$req->user_id)}}" name="app" id="approve" value="" class="btn btn-success">Aprove</a>

                                      {{-- @endif
                                    @endif --}}
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                    @endforeach
                                </tbody>
                            </table>




                        </div>

                    </div>
                </div>
            </div>
</div>


@endsection




@section('script')

<script>
     $(document).ready(function() {

        console.log("ss");
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

             $.ajax({
               type:"GET",
               url:"/fetchData",
               dataType:"json",

               success:function(response){

                console.log("hello");
                console.log(response.update_request);
               }
             });
         });

        var myRow=0;
          $('.show_data').each(function(){
            myRow=myRow+1;
            $(this).attr("id","mybtn"+myRow);
          });

        $('.mybtn').on('click',function (e){
        e.preventDefault();
        var id = $(this).data('value');
        console.log(id);
        $('#exampleModal').modal('show');
        $.ajax({
               type:"GET",
               url:"/fetchData/"+id,
               dataType:"json",

               success:function(response){

                console.log("hello");
                $('#booking_money').text(response.update_request.booking_money);
                $('#booking_money_payment_type').text(response.update_request.booking_money_payment_type);
                $('#booking_money_paid').text(response.update_request.booking_money_paid);
                console.log(response);
                $('#booking_money_paid_date').text(response.update_request.booking_money_paid_date);
                $('#booking_money_note').text(response.update_request.booking_money_note);
                $('#booking_money_due_date').text(response.update_request.booking_money_due_date);

                $('#building_pilling_money').text(response.update_request.building_pilling_money);
                $('#building_pilling_money_due').text(response.update_request.building_pilling_money_due);
                $('#building_pilling_money_due_date').text(response.update_request.building_pilling_money_due_date);
                $('#building_pilling_money_note').text(response.update_request.building_pilling_money_note);
                $('#building_pilling_money_paid').text(response.update_request.building_pilling_money_paid);
                $('#building_pilling_money_due').text(response.update_request.building_pilling_money_due);
                $('#building_pilling_money_paid_date').text(response.update_request.building_pilling_money_paid_date);

                $('#car_parking_money').text(response.update_request.car_parking_money);
                $('#car_parking_money_due').text(response.update_request.car_parking_money_due);
                $('#car_parking_money_note').text(response.update_request.car_parking_money_note);
                $('#car_parking_money_due_date').text(response.update_request.car_parking_money_due_date);
                $('#car_parking_money_paid_date').text(response.update_request.car_parking_money_paid_date);
                $('#car_parking_money_payment_type').text(response.update_request.car_parking_money_payment_type);

                $('#downpayment_money').text(response.update_request.downpayment_money);
                $('#downpayment_money_due').text(response.update_request.downpayment_money_due);
                $('#downpayment_money_due_date').text(response.update_request.downpayment_money_due_date);
                $('#downpayment_money_note').text(response.update_request.downpayment_money_note);
                $('#downpayment_money_paid').text(response.update_request.downpayment_money_paid);
                $('#downpayment_money_payment_type').text(response.update_request.downpayment_money_payment_type);

                $('#finishing_work_money').text(response.update_request.finishing_work_money);
                $('#finishing_work_money_due').text(response.update_request.finishing_work_money_due);
                $('#finishing_work_money_due_date').text(response.update_request.finishing_work_money_due_date);
                $('#finishing_work_money_note').text(response.update_request.finishing_work_money_note);
                $('#finishing_work_money_paid').text(response.update_request.finishing_work_money_paid);
                $('#finishing_work_money_payment_type').text(response.update_request.finishing_work_money_payment_type);

                $('#floor_roof_casting_money_1st').text(response.update_request.floor_roof_casting_money_1st);
                $('#floor_roof_casting_money_due_1st').text(response.update_request.floor_roof_casting_money_due_1st);
                $('#floor_roof_casting_money_due_date_1st').text(response.update_request.floor_roof_casting_money_due_date_1st);
                $('#floor_roof_casting_money_note_1st').text(response.update_request.floor_roof_casting_money_note_1st);
                $('#floor_roof_casting_money_paid_1st').text(response.update_request.floor_roof_casting_money_paid_1st);
                $('#floor_roof_casting_money_paid_date_1st').text(response.update_request.floor_roof_casting_money_paid_date_1st);
                $('#floor_roof_casting_money_payment_type_1st').text(response.update_request.floor_roof_casting_money_payment_type_1st);


                $('#land_filling_money_1').text(response.update_request.land_filling_money_1);
                $('#land_filling_money_due_1').text(response.update_request.land_filling_money_1);
                $('#land_filling_money_due_date_1').text(response.update_request.land_filling_money_due_date_1);
                $('#land_filling_money_note_1').text(response.update_request.land_filling_money_note_1);
                $('#land_filling_money_due_date_1').text(response.update_request.land_filling_money_due_date_1);
                $('#land_filling_money_paid_1').text(response.update_request.land_filling_money_paid_1);
                $('#land_filling_money_paid_date_1').text(response.update_request.land_filling_money_paid_date_1);
                $('#land_filling_money_payment_type_1').text(response.update_request.land_filling_money_payment_type_1);



                $('#land_filling_money_2').text(response.update_request.land_filling_money_2);
                $('#land_filling_money_due_2').text(response.update_request.land_filling_money_due_2);
                $('#land_filling_money_due_date_2').text(response.update_request.land_filling_money_due_date_2);
                $('#land_filling_money_note_2').text(response.update_request.land_filling_money_note_2);
                $('#land_filling_money_paid_2').text(response.update_request.land_filling_money_paid_2);
                $('#land_filling_money_paid_date_2').text(response.update_request.land_filling_money_paid_date_2);
                $('#land_filling_money_payment_type_2').text(response.update_request.land_filling_money_payment_type_2);











               }
             });




    });



</script>





@endsection





