@extends('master.master')
@section('content')



<!-- end page title -->
    <div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body">

                <h2 class="card-title">registration</h2>
                <p class="card-title-desc">registration info
                </p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>registration money</th>
                        <th>initial money</th>
                        <th>type</th>
                        <th>paid</th>
                        <th>due</th>
                        <th>paid date</th>
                        <th>due date</th>
                        <th>note</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($others as $other)
                    <tr>
                        {{-- @php dd($other) @endphp --}}
                        <td>{{$other->user->member_name}}</td>



                        <td>{{$other->registrationpayment_money}}</td>
                        <td>{{$other->initial_registrationpayment_money}}</td>
                        <td>{{$other->registrationpayment_money_payment_type}}</td>
                        <td>{{$other->registrationpayment_money_paid}}</td>
                        <td>{{$other->registrationpayment_money_due}}</td>
                        <td>{{$other->registrationpayment_money_paid_date}}</td>
                        <td>{{$other->registrationpayment_money_due_date}}</td>
                        <td>{{$other->registrationpayment_money_note}}</td>
                        <td>
                            <a href="{{route('super_admin.car.parking.edit',$other->user_id)}}" class="btn btn-info" title="Edit Data"><i class="fas fa-pen"></i> </a>
                        <a href="{{route('super_admin.car.parking.delete',$other->user_id)}}" class="btn btn-danger" title="Delete Data" id="#">
                          <i class="fa fa-trash"></i>
                       </a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->



<div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body">

                <h2 class="card-title">car parking</h2>
                <p class="card-title-desc">Car parking info
                </p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>parking money</th>
                        <th>initial money</th>
                        <th>type</th>
                        <th>paid</th>
                        <th>due</th>
                        <th>paid date</th>
                        <th>due date</th>
                        <th>note</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($others as $other)
                        <tr>
                            <td>{{$other->user->member_name}}</td>



                            <td>{{$other->car_parking_money}}</td>
                            <td>{{$other->initial_car_parking_money}}</td>
                            <td>{{$other->car_parking_money_payment_type}}</td>
                            <td>{{$other->car_parking_money_paid}}</td>
                            <td>{{$other->car_parking_money_due}}</td>
                            <td>{{$other->car_parking_money_paid_date}}</td>
                            <td>{{$other->car_parking_money_due_date}}</td>
                            <td>{{$other->car_parking_money_note}}</td>
                            <td>
                                <a href="{{ route('super_admin.car.parking.edit',$other->user_id) }}" class="btn btn-info" title="Edit Data"><i class="fas fa-pen"></i> </a>
                                <a href="{{route('super_admin.car.parking.delete',$other->user_id)}}" class="btn btn-danger" title="Delete Data" id="#">
                                  <i class="fa fa-trash"></i>
                               </a>
                                </td>

                        </tr>
                        @endforeach
                                     </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


<div class="row">
    <div class="col-12">
        <div class="card text-center">
            <div class="card-body">

                <h2 class="card-title">Khajna tables</h2>
                <p class="card-title-desc">khajna information
                </p>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>khajna money</th>
                        <th>initial money</th>
                        <th>type</th>
                        <th>paid</th>
                        <th>due</th>
                        <th>paid date</th>
                        <th>due date</th>
                        <th>note</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($others as $other)
                        <tr>
                            <td>{{$other->user->member_name}}</td>



                            <td>{{$other->khajna_money}}</td>
                            <td>{{$other->initial_khajna_money}}</td>
                            <td>{{$other->khajna_money_payment_type}}</td>
                            <td>{{$other->khajna_money_paid}}</td>
                            <td>{{$other->khajna_money_due}}</td>
                            <td>{{$other->khajna_money_paid_date}}</td>
                            <td>{{$other->khajna_money_due_date}}</td>
                            <td>{{$other->khajna_money_note}}</td>
                            <td>
                                <a href="{{ route('super_admin.car.parking.edit',$other->user_id) }}" class="btn btn-info" title="Edit Data"><i class="fas fa-pen"></i> </a>
                                <a href="{{route('super_admin.car.parking.delete',$other->user_id)}}" class="btn btn-danger" title="Delete Data" id="#">
                                  <i class="fa fa-trash"></i>
                               </a>
                                </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection




@section('script')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/js/pages/datatables.init.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

@endsection
