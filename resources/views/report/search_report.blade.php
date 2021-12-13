@extends('master.master')
@section('css')
    <style>
        @media print {
            .printb {
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
                    <form action="{{ route('admin.search_report') }}" autocomplete="off" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label class="form-label">Search Range</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                        data-date-autoclose="true" data-provide="datepicker"
                                        data-date-container="#datepicker6">
                                        <input type="text" class="form-control" name="start" placeholder="Start Date"
                                            required>
                                        <input type="text" class="form-control" name="end" placeholder="End Date"
                                            required>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <select name="basic_information" id="" class="form-control" required>
                                        <option value="" selected disabled>Select type
                                        </option>
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


                                @if (isset($booking_status))

                                    @foreach ($booking_status as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Booking Money</td>
                                            <td>{{ $item->booking_money_paid }}</td>
                                            <td>{{ $item->booking_money_paid_date }}</td>
                                            <td>{{ $item->booking_money_due }}</td>
                                            <td>{{ $item->booking_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$booking_status_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$booking_status_total_due}}</h4></td>
                                        <td></td>
                                    </tr>
                                @endif

                                @if (isset($down_payment))
                                    @foreach ($down_payment as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Down Payment </td>
                                            <td>{{ $item->downpayment_money_paid }}</td>
                                            <td>{{ $item->downpayment_money_paid_date }}</td>
                                            <td>{{ $item->downpayment_money_due }}</td>
                                            <td>{{ $item->downpayment_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>

                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$down_payment_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$down_payment_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($car_parking))
                                    @foreach ($car_parking as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Car parking </td>
                                            <td>{{ $item->car_parking_money_paid }}</td>
                                            <td>{{ $item->car_parking_money_paid_date }}</td>
                                            <td>{{ $item->car_parking_money_due }}</td>
                                            <td>{{ $item->car_parking_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>

                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$car_parking_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$car_parking_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($land_filling_1st))
                                    @foreach ($land_filling_1st as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Land Filling 1st </td>
                                            <td>{{ $item->land_filling_money_paid }}</td>
                                            <td>{{ $item->land_filling_money_paid_date }}</td>
                                            <td>{{ $item->land_filling_money_due }}</td>
                                            <td>{{ $item->land_filling_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$land_filling_1st_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$land_filling_1st_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($land_filling_2nd))
                                    @foreach ($land_filling_2nd as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Land Filling 1st </td>
                                            <td>{{ $item->land_filling_money_paid }}</td>
                                            <td>{{ $item->land_filling_money_paid_date }}</td>
                                            <td>{{ $item->land_filling_money_due }}</td>
                                            <td>{{ $item->land_filling_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$land_filling_2nd_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$land_filling_2nd_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($building_pilling))
                                    @foreach ($building_pilling as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Land Filling 1st </td>
                                            <td>{{ $item->building_pilling_money_paid }}</td>
                                            <td>{{ $item->building_pilling_money_paid_date }}</td>
                                            <td>{{ $item->building_pilling_money_due }}</td>
                                            <td>{{ $item->building_pilling_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>

                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$building_pilling_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$building_pilling_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($first_floor))
                                    @foreach ($first_floor as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Land Filling 1st </td>
                                            <td>{{ $item->floor_roof_casting_money_paid_1st }}</td>
                                            <td>{{ $item->floor_roof_casting_money_paid_date_1st }}</td>
                                            <td>{{ $item->floor_roof_casting_money_due_1st }}</td>
                                            <td>{{ $item->floor_roof_casting_money_paid_date_1st }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$first_floor_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$first_floor_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($finishing_money))
                                    @foreach ($finishing_money as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Finishing Work </td>
                                            <td>{{ $item->finishing_work_money_paid }}</td>
                                            <td>{{ $item->finishing_work_money_paid_date }}</td>
                                            <td>{{ $item->finishing_work_money_due }}</td>
                                            <td>{{ $item->finishing_work_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$finishing_money_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$finishing_money_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif

                                @if (isset($after_handover_money))
                                    @foreach ($after_handover_money as $item)
                                        <tr>
                                            <th>{{ optional($item->user)->file_no }}</th>
                                            <td>Ater handover </td>
                                            <td>{{ $item->after_handover_money_money_paid }}</td>
                                            <td>{{ $item->after_handover_money_paid_date }}</td>
                                            <td>{{ $item->after_handover_money_money_due }}</td>
                                            <td>{{ $item->after_handover_money_due_date }}</td>
                                        </tr>

                                    @endforeach
                                    <tr>
                                        <td colspan="2"  style="text-align: right;"><h5>Total paid Amount </h5> </td>
                                        <td><h4 class="text-success ">{{$after_handover_money_total}}</h4></td>
                                        <td><h5 style="text-align: right;">Total Due Amount </h5></td>
                                        <td><h4 class="text-danger">{{$after_handover_money_total_due}}</h4></td>
                                        <td></td>
                                    </tr>

                                @endif



                            </tbody>
                        </table>
                        <a class="btn btn-primary px-4 mt-3 printb" href="javaScript:void(0)" onclick="window.print();"><i
                                class="fas fa-download"></i> Print </a>



                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <script src="{{ asset('assets') }}/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/form-validation.init.js"></script>

@endsection
