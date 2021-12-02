@extends('master.master')

@section('content')



<div class="container-fluid">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Form Validation</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Validation</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-primary  dropdown-toggle" style="background: #333547" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
    <!-- end page title -->


    <form method="POST" action=" @if(Auth::guard('super_admin')->check()) {{ route('super_admin.basic_amount.store',$user->id) }} @elseif(Auth::guard('admin')->check()) {{ route('admin.basic_amount.store',$user->id) }} @elseif(Auth::guard('employee')->check()) {{ route('employee.basic_amount.store',$user->id) }}@endif" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row ">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold">Total Amount Information</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="totalAmount"> Total Amount</label>
                                            <input type="number" name="total_amount" id="totalAmount" class="form-control @error('total_amount')is-invalid @enderror" required>
                                            @error('total_amount')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Total Amount Note</label>
                                            <textarea rows="3" cols="50" type="text" name="total_amount_note" class="form-control"> </textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row ">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold"> Installment Information</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="installamount">Installment Amount</label>
                                            <input  type="text" name="installment_amount" id="installamount" class="form-control @error('installment_amount')is-invalid @enderror" required>
                                            @error('installment_amount')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label for="installstartt">Installment Starting Date</label>
                                            <input  type="date" name="installment_start_date" id="installstartt" class="form-control @error('installment_start_date')is-invalid @enderror" required>
                                            @error('installment_start_date')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="form-group mb-3">
                                            <label> Number of Installment</label>
                                            <input type="text" name="installment_number" id="installmentnumber" class="form-control  @error('installment_number')is-invalid @enderror @error('installment_years_amount')is-invalid @enderror" value="{{old('installment_number')}}" required>
                                            @error('installment_number')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            @error('installment_years_amount')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row" id="fieldList">

                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Installment Note</label>
                                            <textarea rows="3" cols="50" type="text" name="installment_amount_note" class="form-control"> </textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row ">
                            <div class="col-12">
                                <div class="row ">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold">Booking Status</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Booking Money Total</label>
                                            <input type="text" name="booking_money" id="booking-money" class="form-control @error('booking_money')is-invalid @enderror" required>
                                            @error('booking_money')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Booking Money Paid :
                                            </label>

                                            <input type="text" name="booking_money_paid"  id="booking_money_paid" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Booking Money Paid Date</label>
                                            <input type="date" name="booking_money_paid_date" id="booking-money-paid-date" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Booking Money Due Date</label>
                                            <input type="date" name="booking_money_due_date" id="booking-money-due-date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Booking Money Payment Type </label>
                                            <select name="booking_money_payment_type" id="" class="form-control">
                                                <option value="" disabled >Select Payment type
                                                </option>
                                                <option value="Check">Check</option>
                                                <option value="Bank" >Bank</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Booking Money Note</label>
                                            <textarea rows="3" cols="50" type="text" name="booking_money_note" class="form-control"> </textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2 pt-2">


                        <div class="row ">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center text-bold pt-3 pb-3">Down Payment Status</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Down Payment Total</label>
                                            <input type="text" name="downpayment_money"  id="down-payment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Down Payment Paid : </label>
                                            <input type="text" name="downpayment_money_paid"  id="down-payment-paid" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Down Payment Paid Date</label>
                                            {{-- {{date('Y-m-d',strtotime($booking_status->booking_money_due_date))}} --}}
                                            <input type="date" name="downpayment_money_paid_date" id="down-payment-paid-date" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Down Payment Due Date</label>
                                            <input type="date" name="downpayment_money_due_date" id="down-payment-due-date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Down Payment Payment Type </label>
                                            <select name="downpayment_money_payment_type" id="" class="form-control">
                                                <option value="" disabled >Select Payment type
                                                </option>
                                                <option value="Check">Check</option>
                                                <option value="Bank" >Bank</option>
                                                <option value="Cash" >Cash</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Down Payment Note</label>
                                            <textarea rows="3" cols="50" type="text" name="downpayment_money_note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold ">Car parking Status</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Total</label>
                                                <input type="text" name="car_parking_money" id="car-parking" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Paid :</label>
                                                <input type="text" name="car_parking_money_paid" id="car-parking-paid" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Paid Date</label>
                                                <input type="date" name="car_parking_money_paid_date" id="car-parking-paid-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Due Date</label>
                                                <input type="date" name="car_parking_due_date" id="car-parking-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Payment Type </label>

                                                <select name="car_parking_money_payment_type" id="" class="form-control">
                                                    <option value="" disabled>Select Payment type
                                                    </option>
                                                    <option value="Check">Check</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Note</label>
                                                <textarea rows="3" cols="50" type="text" name="car_parking_money_note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">

                        <div class="row ">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold ">Land Filling (1st) Status</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(1st) Total</label>
                                                <input type="text" name="land_filling_money"  id="land-filling-1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(1st) Paid : </label>
                                                <input type="text" name="land_filling_money_paid"  id="land-filling-1-paid" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(1st) Paid Date</label>
                                                <input type="date" name="land_filling_money_paid_date" id="land-filling-1-paid-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(1st) Due Date</label>
                                                <input type="date" name="land_filling_money_due_date" id="land-filling-1-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(1st) Payment Type </label>

                                                <select name="land_filling_money_payment_type" id="" class="form-control">
                                                    <option value="" disabled >Select Payment type
                                                    </option>
                                                    <option value="Check">Check</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(1st) Note</label>
                                                <textarea rows="3" cols="50" type="text" name="land_filling_money_note" class="form-control"></textarea>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>






                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold ">Land Filling (2nd) Status</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(2nd) Total</label>
                                                <input type="text" name="land_filling_money2" id="land-filling-2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(2nd) Paid: </label>
                                                <input type="text" name="land_filling_money_paid2" id="land_filling_money_paid2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(2nd) Paid Date</label>
                                                <input type="date" name="land_filling_money_paid_date2"  id="land-filling-2-paid-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(2nd) Due Date</label>
                                                <input type="date" name="land_filling_money_due_date2"  id="land-filling-2-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(2nd) Payment Type </label>

                                                <select id="" name="land_filling_money_payment_type2" class="form-control">
                                                    <option value="" disabled>Select Payment type
                                                    </option>
                                                    <option value="Check">Check</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Land Filling(2nd) Note</label>
                                                <textarea rows="3" cols="50" type="text" name="land_filling_money_note2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold ">Building Pilling Status</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Building Pilling Total</label>
                                                <input type="text" name="building_pilling_money"  id="building-pilling" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Building Pilling Paid :</label>
                                                <input type="text" name="building_pilling_money_paid" id="building-pilling-paid" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Building Pilling Paid Date</label>
                                                <input type="date" name="building_pilling_money_paid_date"  id="building-pilling-paid-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Building Pilling Due Date</label>
                                                <input type="date" name="building_pilling_money_due_date" id="building-pilling-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>Building Pilling Payment Type </label>
                                                <select name="building_pilling_money_payment_type" id="" class="form-control">
                                                    <option value="" disabled>Select Payment type
                                                    </option>
                                                    <option value="Check">Check</option>
                                                    <option value="Bank" >Bank</option>
                                                    <option value="Cash" >Cash</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>Building Pilling Note</label>
                                                <textarea rows="3" cols="50" type="text" name="building_pilling_money_note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>








                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center pt-3 pb-3 text-bold ">1st Floor Roof Casting Status</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>1st floor Roof Casting Total</label>
                                                <input type="text"  name="floor_roof_casting_money_1st" id="roof-casting" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>1st floor Roof Casting Paid :</label>
                                                <input type="text"  name="floor_roof_casting_money_paid_1st" id="roof-casting-paid" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>1st floor Roof Casting Paid Date</label>
                                                <input type="date" name="floor_roof_casting_money_paid_date_1st"  id="roof-casting-paid-date" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>1st floor Roof Casting Due Date</label>
                                                <input type="date" name="floor_roof_casting_money_due_1st"  id="roof-casting-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>1st floor Roof Casting Payment Type </label>

                                                <select name="floor_roof_casting_money_payment_type_1st" id="" class="form-control">
                                                    <option value="" disabled>Select Payment type
                                                    </option>
                                                    <option value="Check">Check</option>
                                                    <option value="Bank">Bank</option>
                                                    <option value="Cash">Cash</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label>1st floor Roof Casting Note</label>
                                                    <textarea rows="3" cols="50" type="text" name="floor_roof_casting_money_note_1st" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center text-bold pt-3 pb-3">Finishing Work Status</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Finishing Work</label>
                                            <input type="text" name="finishing_work_money"  id="finishing-work" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Finishing Work Paid Amount : </label>
                                            <input type="text" name="finishing_work_money_paid"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Finishing Work Payment Type </label>
                                            <select name="finishing_work_money_payment_type" id="" class="form-control">
                                                <option value="" disabled >Select Payment type
                                                </option>
                                                <option value="Check">Check</option>
                                                <option value="Bank" >Bank</option>
                                                <option value="Cash" >Cash</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Finishing Work Paid Date</label>
                                            <input type="date" name="finishing_work_money_paid_date"  id="finishing-work-paid-date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-3">
                                            <label>Finishing Work Due Date</label>
                                            <input type="date" name="finishing_work_money_due_date"  id="finishing-work-paid-date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label>Finishing Work Note</label>
                                            <textarea rows="3" cols="50" type="text" name="finishing_work_money_note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>








                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center text-bold pt-3 pb-3">After Handover Money</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>After Handover Money </label>
                                            <input type="text" name="after_handover_money"  id="after-handover-money" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>After Handover Money Paid Amount :</label>
                                            <input type="text" name="after_handover_money_money_paid"  id="after_handover_money_paid_amount" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>After Handover Money Payment Type </label>

                                            <select name="after_handover_money_payment_type" id="" class="form-control">
                                                <option value="" disabled >Select Payment type </option>
                                                <option value="Check">Check</option>
                                                <option value="Bank" >Bank</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>After Handover Money Paid Date</label>
                                                <input type="date" name="after_handover_money_paid_date" v id="after-handover-money-paid-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label>After Handover Money Due Date</label>
                                                <input type="date" name="after_handover_money_due_date"  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label>After Handover Money Note</label>
                                                <textarea rows="3" cols="50" type="text" name="after_handover_money_note" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <div class="row text-center"></div>


        <div class="col-lg-6 offset-lg-6">
            <button type="submit" class="btn btn-lg mb-3 text-white btn-block text-bold" style="background-color:#333547;">Submit</button>
        </div>


    </form>
</div>
</div>

<!-- /.content -->

<!-- /.container fluid ends -->
<script>
    function addInstallment(i){

         $("#fieldList").append(`
         <div class="col-lg-4">
            <div class="form-group mb-3">
                <label> ${i} year Intallment Amount</label>
                <input class="form-control" type='text' name='installment_years_amount[]' placeholder=' Intallment Amount' required />
            </div>
         </div>
         `);
    }
    $(document).ready(function(){

        let installmentNumber =document.querySelector('#installmentnumber');

        installmentNumber.addEventListener('keyup',function(event){
            $('#fieldList').empty();
            let installMentValue = event.target.value;
            // if(insta)
            let totalYear    = Math.ceil(installMentValue/12);

            for(var i=1; i<=totalYear;i++){
                addInstallment(i);
            }

        })
    })

</script>


@endsection

@section('script')
<script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>
@endsection

