@extends('master.master')
@section('css')
<style>
@media print{
 .printb{
     display: none;
 }
}

</style>

@endsection
@section('content')


@auth('super_admin')
    <div class="row">
        <div class="col-12">
            <div class="card printb">
                <div class="card-body">
                    <form action=" @if (Auth::guard('super_admin')->check()) {{ route('super_admin.daily_report') }}
                        @elseif(Auth::guard('admin')->check()) {{ route('admin.daily_report')  }} @endif " autocomplete="off">
                        <div class="mb-4">
                            <label class="form-label">Search Range</label>
                            <div class="row">
                                <div class="col-lg-8">

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
@endauth




<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Todays Report Report</h4>
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
                                <td>@if($item->booking_money_paid_date != null){{\Carbon\Carbon::parse($item->booking_money_paid_date)->format('d-M-Y')}}  @else @endif</td>

                                <td>{{$item->booking_money_due}}</td>
                                <td>@if($item->booking_money_due_date != null){{\Carbon\Carbon::parse($item->booking_money_due_date)->format('d-M-Y')}}  @else @endif</td>


                            </tr>

                            @endforeach

                            @endif

                            @if(isset($down_payment))
                                @foreach($down_payment as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Down Payment </td>
                                    <td>{{$item->downpayment_money_paid}}</td>
                                    <td>@if($item->downpayment_money_paid_date != null){{\Carbon\Carbon::parse($item->downpayment_money_paid_date)->format('d-M-Y')}}  @else @endif</td>

                                    <td>{{$item->downpayment_money_due}}</td>
                                    <td>@if($item->downpayment_money_due_date != null){{\Carbon\Carbon::parse($item->downpayment_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                                </tr>

                                @endforeach


                            @endif

                            @if(isset($car_parking))
                                @foreach($car_parking as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Car parking </td>
                                    <td>{{$item->car_parking_money_paid}}</td>
                                    <td>@if($item->car_parking_money_paid_date != null){{\Carbon\Carbon::parse($item->car_parking_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                                    <td>{{$item->car_parking_money_due}}</td>
                                    <td>@if($item->car_parking_money_due_date != null){{\Carbon\Carbon::parse($item->car_parking_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                                </tr>

                                @endforeach


                            @endif

                            @if(isset($land_filling_1st))
                            @foreach($land_filling_1st as $item)
                            <tr>
                                <th>{{optional($item->user)->file_no}}</th>
                                <td>Land Filling 1st </td>
                                <td>{{$item->land_filling_money_paid}}</td>
                                <td>@if($item->land_filling_money_paid_date != null){{\Carbon\Carbon::parse($item->land_filling_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                                <td>{{$item->land_filling_money_due}}</td>
                                <td>@if($item->land_filling_money_due_date != null){{\Carbon\Carbon::parse($item->land_filling_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                            </tr>

                            @endforeach


                            @endif

                            @if(isset($land_filling_2nd))
                                @foreach($land_filling_2nd as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Land Filling 2nd </td>
                                    <td>{{$item->land_filling_money_paid}}</td>
                                    <td>@if($item->land_filling_money_paid_date != null){{\Carbon\Carbon::parse($item->land_filling_money_paid_date)->format('d-M-Y')}}  @else @endif</td><td>@if($other->registrationpayment_money_due_date != null){{\Carbon\Carbon::parse($other->registrationpayment_money_due_date)->format('d-M-Y')}}  @else @endif</td>
                                    <td>{{$item->land_filling_money_due}}</td>
                                    <td>@if($item->land_filling_money_due_date != null){{\Carbon\Carbon::parse($item->land_filling_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                                </tr>

                                @endforeach


                            @endif

                            @if(isset($building_pilling))
                                @foreach($building_pilling as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Building Pilling </td>
                                    <td>{{$item->building_pilling_money_paid}}</td>
                                    <td>@if($item->building_pilling_money_paid_date != null){{\Carbon\Carbon::parse($item->building_pilling_money_paid_date)->format('d-M-Y')}}  @else @endif</td>
                                    <td>{{$item->building_pilling_money_due}}</td>
                                    <td>@if($item->building_pilling_money_due_date != null){{\Carbon\Carbon::parse($item->building_pilling_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                                </tr>

                                @endforeach


                            @endif

                            @if(isset($first_floor))
                                @foreach($first_floor as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Floor Roof Casting 1st </td>
                                    <td>{{$item->floor_roof_casting_money_paid_1st}}</td>
                                    <td>@if($item->floor_roof_casting_money_paid_date_1st != null){{\Carbon\Carbon::parse($item->floor_roof_casting_money_paid_date_1st)->format('d-M-Y')}}  @else @endif</td>
                                    <td>{{$item->floor_roof_casting_money_due_1st}}</td>
                                    <td>@if($item->floor_roof_casting_money_paid_date_1st != null){{\Carbon\Carbon::parse($item->floor_roof_casting_money_paid_date_1st)->format('d-M-Y')}}  @else @endif</td>

                                </tr>

                                @endforeach

                            @endif

                            @if(isset($finishing_money))
                                @foreach($finishing_money as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Finishing Work </td>
                                    <td>{{$item->finishing_work_money_paid}}</td>
                                    <td>@if($item->finishing_work_money_paid_date != null){{\Carbon\Carbon::parse($item->finishing_work_money_paid_date)->format('d-M-Y')}}  @else @endif</td>

                                    <td>{{$item->finishing_work_money_due}}</td>
                                    <td>@if($item->finishing_work_money_due_date != null){{\Carbon\Carbon::parse($item->finishing_work_money_due_date)->format('d-M-Y')}}  @else @endif</td>

                                </tr>

                                @endforeach


                            @endif

                            @if(isset($after_handover_money))
                                @foreach($after_handover_money as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Ater handover </td>
                                    <td>{{$item->after_handover_money_money_paid}}</td>
                                    <td>@if($item->after_handover_money_paid_date != null){{\Carbon\Carbon::parse($item->after_handover_money_paid_date)->format('d-M-Y')}}  @else @endif</td>

                                    <td>{{$item->after_handover_money_money_due}}</td>
                                    <td>@if($item->after_handover_money_due_date != null){{\Carbon\Carbon::parse($item->after_handover_money_due_date)->format('d-M-Y')}}  @else @endif</td>

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

                    {{-- <a class="btn btn-primary px-4 mt-3 printb" href="{{route('admin.pdf.daily_report')}}" ><i class="fas fa-download"></i> Download PDF</a> --}}
                    <a class="btn btn-primary px-4 mt-3 printb" href="javaScript:void(0)" onclick="window.print();"><i class="fas fa-download"></i> Print </a>

                </div>

            </div>
        </div>
    </div>


</div>

@endsection
@section('script')
<script src="{{asset('assets')}}/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>

@endsection
