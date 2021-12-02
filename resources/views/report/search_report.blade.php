@extends('master.master')
@section('content')
<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="page-title">Alerts</h6>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                <li class="breadcrumb-item"><a href="#">UI Elements</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alerts</li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="float-end d-none d-md-block">
                <div class="dropdown">
                    <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-cog me-2"></i> Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.search_report')}}" autocomplete="off" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label class="form-label">Search Range</label>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6">
                                    <input type="text" class="form-control" name="start" placeholder="Start Date" required>
                                    <input type="text" class="form-control" name="end" placeholder="End Date" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <select name="basic_information" id="" class="form-control" required>
                                    <option  disabled>Select Basic Information</option>
                                    <option value="booking_money">Booking Status</option>
                                    <option value="down_payment">Down Payment Status</option>
                                    <option value="car_parking">Car parking Status</option>
                                    <option value="land_filling_1">Land Filling (1st) Status</option>
                                    <option value="land_filling_2">Land Filling (2nd) Status</option>
                                    <option value="building_pilling">Building Pilling Status</option>
                                    <option value="floor_roof_casting">1st Floor Roof Casting Status</option>
                                    <option value="finishing_work">Finishing Work Status</option>
                                    <option value="after_handover">After Handover Money</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <button class="btn btn-primary" type="submit" name="search">Search </button>
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
                <h4 class="card-title">Daily Report</h4>
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
                            <tr>
                                <td colspan="2">Total Amount</td>
                                <td colspan="2">{{$booking_status_total}}</td>
                                <td></td>
                                <td></td>
                            </tr>
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
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$down_payment_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

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
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$car_parking_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

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
                            <tr>
                                <td colspan="2">Total Amount</td>
                                <td colspan="2">{{$land_filling_1st_total}}</td>
                                <td></td>
                                <td></td>
                            </tr>

                            @endif

                            @if(isset($land_filling_2nd))
                                @foreach($land_filling_2nd as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Land Filling 1st </td>
                                    <td>{{$item->land_filling_money_paid}}</td>
                                    <td>{{$item->land_filling_money_paid_date}}</td>
                                    <td>{{$item->land_filling_money_due}}</td>
                                    <td>{{$item->land_filling_money_due_date}}</td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$land_filling_2nd_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            @endif

                            @if(isset($building_pilling))
                                @foreach($building_pilling as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Land Filling 1st </td>
                                    <td>{{$item->building_pilling_money_paid}}</td>
                                    <td>{{$item->building_pilling_money_paid_date}}</td>
                                    <td>{{$item->building_pilling_money_due}}</td>
                                    <td>{{$item->building_pilling_money_due_date}}</td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$building_pilling_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            @endif

                            @if(isset($first_floor))
                                @foreach($first_floor as $item)
                                <tr>
                                    <th>{{optional($item->user)->file_no}}</th>
                                    <td>Land Filling 1st </td>
                                    <td>{{$item->floor_roof_casting_money_paid_1st}}</td>
                                    <td>{{$item->floor_roof_casting_money_paid_date_1st}}</td>
                                    <td>{{$item->floor_roof_casting_money_due_1st}}</td>
                                    <td>{{$item->floor_roof_casting_money_paid_date_1st}}</td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$first_floor_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

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
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$finishing_money_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

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
                                    <td colspan="2">Total Amount</td>
                                    <td colspan="2">{{$after_handover_money_total}}</td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            @endif



                        </tbody>
                    </table>




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
