@extends('master.master')
@section('content')
<div class="container-fluid">
    <form method="POST" action="@if(Auth::guard('super_admin')->check()) {{ route('super_admin.car.parking.store',$user->id) }} @elseif(Auth::guard('admin')->check()) {{ route('admin.car.parking.store',$user->id) }} @elseif(Auth::guard('employee')->check()) {{ route('employee.car.parking.store',$user->id) }}@endif" class="row g-3 needs-validation" novalidate>
        @csrf
    <div class="row">
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
                                                <label>Initial Car Parking Total</label>
                                                <input type="text" name="initial_car_parking_money" id="initial-car-parking" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Total</label>
                                                <input type="text" name="car_parking_money" id="car-parking" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Paid :</label>
                                                <input type="text" name="car_parking_money_paid" id="car-parking-paid" class="form-control @error('car_parking_money_paid')is-invalid @enderror">
                                                @error('car_parking_money_paid')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Paid Date</label>
                                                <input type="date" name="car_parking_money_paid_date" id="car-parking-paid-date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label>Car Parking Due Date</label>
                                                <input type="date" name="car_parking_due_date" id="car-parking-due-date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
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
                            <div class="row ">
                                <div class="col-12">
                                    <h5 class="text-center pt-3 pb-3 text-bold">khajna Status</h5>
                                </div>
                            </div>
                            <div class="row">




                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label>Initial khajna Money Total</label>
                                        <input type="text" name="initial_khajna_money" id="initial-khajna-money" class="form-control @error('initial_khajna_money')is-invalid @enderror">
                                        @error('initial_khajna_money')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label>khajna Money Total</label>
                                        <input type="text" name="khajna_money" id="khajna-money" class="form-control @error('khajna_money')is-invalid @enderror">
                                        @error('khajna_money')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label>khajna Money Paid :
                                        </label>

                                        <input type="text" name="khajna_money_paid"  id="khajna_money_paid" class="form-control @error('khajna_money_paid')is-invalid @enderror">
                                        @error('khajna_money_paid')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label>khajna Money Paid Date</label>
                                        <input type="date" name="khajna_money_paid_date" id="khajna-money-paid-date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label>khajna Money Due Date</label>
                                        <input type="date" name="khajna_money_due_date" id="khajna-money-due-date" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label>khajna Money Payment Type </label>
                                        <select name="khajna_money_payment_type" id="" class="form-select">add
                                            <option value="" disabled selected> View Options </option>
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
                                        <label>khajna Money Note</label>
                                        <textarea rows="3" cols="50" type="text" name="khajna_money_note" class="form-control"> </textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="row">

            <div class="col-lg-12">
                <div class="card" style="background: #9eb8c04f">
                    <div class="card-body pt-2 pt-2">


                        <div class="row ">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-center text-bold pt-3 pb-3">registration Payment Status</h5>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>Initial registration Payment Total</label>
                                            <input type="text" name="initial_registrationpayment_money"  id="initial-registration-payment" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>registration Payment Total</label>
                                            <input type="text" name="registrationpayment_money"  id="registration-payment" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>registration Payment Paid : </label>
                                            <input type="text" name="registrationpayment_money_paid"  id="registration-payment-paid" class="form-control @error('registrationpayment_money_paid')is-invalid @enderror">

                                            @error('registrationpayment_money_paid')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>registration Payment Paid Date</label>
                                            {{-- {{date('Y-m-d',strtotime($booking_status->booking_money_due_date))}} --}}
                                            <input type="date" name="registrationpayment_money_paid_date" id="registration-payment-paid-date" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>registration Payment Due Date</label>
                                            <input type="date" name="registrationpayment_money_due_date" id="registration-payment-due-date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label>registration Payment Payment Type </label>
                                            <select name="registrationpayment_money_payment_type" id="" class="form-control">
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
                                            <label>registration Payment Note</label>
                                            <textarea rows="3" cols="50" type="text" name="registrationpayment_money_note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 offset-lg-6">
            <button type="submit" class="btn btn-lg mb-3 text-white btn-block text-bold" style="background-color:#333547;">Submit</button>
        </div>

    </form>




</div>
@endsection


{{-- down-registration --}}
{{-- booking-khajna --}}
