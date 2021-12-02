
@extends('master.master')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/user.css')}}">
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="main-body p-5">
                <div class="user-info pt-5 px-5 ">
                    <div class="d-flex">
                        <div class="user-avater">
                            <img src="{{ asset($user->member_image) }}" alt="image_notfound" />
                        </div>
                        <div >
                            <div class="users-name pt-5">
                                <h3>{{$user->member_name}}</h3>
                            </div>
                            <div class="contacts d-flex">
                                <p><i class="fas fa-envelope-square"></i> {{$user->email}}</p>
                                <p><i class="fas fa-map-signs"></i>{{$user->mailing_address}}</p>
                            </div>
                            <div class="d-flex">
                                <div class="card user-name px-5 py-3">
                                    <div class="usera-im">
                                     <i class="fas fa-book"></i>
                                     <span class="number">{{optional($user->totalAmount)->total_amount}}</span>
                                     <p class="user-para">Total Amount</p>
                                    </div>

                                </div>
                                <div class="card user-name px-5 py-3">
                                    <div class="usera-im">
                                     <i class="fas fa-calendar-week"></i>
                                     <span class="number">{{$total_paid}}</span>
                                     <p class="user-para">Total Paid</p>
                                    </div>

                                </div>
                                <div class="card user-name px-5 py-3">
                                    <div class="usera-im">
                                     <i class="fas fa-calendar-week"></i>
                                     <span class="number">{{$total_due}}</span>
                                     <p class="user-para">Total Due</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
        <!-- ==================================================================== -->

                   <div class="submenu my-5 pb-5"role="tablist" >
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a href="#!"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"  role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a href="#!"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a href="#!"  id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"  role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                      </ul>
                   </div>
                </div>

                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <section id="BasicInfo">
                            <div class="user-detail mt-5 p-5">
                                <div class="user-detail-info p-5">
                                    <h3>Basic Information</h3>
                                </div>
                                <div class="pt-5">
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>File No:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->file_no}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Applicant Name:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->member_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Father/Husband Name:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->father_name}}/{{$user->husband_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Mother Name:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->mother_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Milling Address:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->mailing_address}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Parment Address:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->permanent_address}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Mobile No 1:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->phone_no_1}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Mobile No 2:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->phone_no_2}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Date of Birth:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->date_of_birth}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Email:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>National ID No:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->national_id}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Profession/Occupation:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->profession}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Office Address:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->office_address}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Designation:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->designation}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Nominee:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->nominee_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Relation With Applicant:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->relation_with_mominee}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Building No:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$user->building_no}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Total Amount:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{optional($user->totalAmount)->total_amount}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Total Paid Amount </p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$total_paid}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Current Date Due </p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$dueTillToday}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Total Due </p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{$total_due}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>No of Installment:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{optional($user->totalNoOfInstallment)->number_of_installment}}</p>
                                        </div>
                                    </div>
                                    <div class="row no-gutter">
                                        <div class="col-lg-3">
                                            <p>Installment Start Form:</p>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{{optional($user->totalNoOfInstallment)->installment_starting_date}}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <section id="BasicAmount">
                            <div class="user-detail mt-5 p-5">
                                <div class="user-detail-info p-5">
                                    <h3>Basic Amount</h3>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Basic Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Paid Amount Date</th>
                                            <th>Due Amount Date</th>
                                            <th>Note</th>
                                            <th>Send Mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Booking Money</td>
                                            <td>{{optional($user->bookingStatus)->booking_money}}</td>
                                            <td>{{optional($user->bookingStatus)->booking_money_paid_date}}</td>
                                            <td>{{optional($user->bookingStatus)->booking_money_due_date}}</td>
                                            <td>{{optional($user->bookingStatus)->booking_money_note}}</td>
                                            <td><a href="@if(Auth::guard('super_admin')->check()){{route('super_admin.user.email',['id'=>$user->id,'subject'=>str::slug('Booking Money')])}} @elseif(Auth::guard('admin')->check()){{route('admin.user.email',['id'=>$user->id,'subject'=>Str::slug('Booking Money')])}} @endif" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Mail</a></td>
                                        </tr>
                                        <tr>
                                            <td>Down Payment</td>
                                            <td>{{optional($user->downPayment)->downpayment_money}}</td>
                                            <td>{{optional($user->downPayment)->downpayment_money_paid_date}}</td>
                                            <td>{{optional($user->downPayment)->downpayment_money_due_date}}</td>
                                            <td>{{optional($user->downPayment)->downpayment_money_note}}</td>

                                        </tr>
                                        <tr>
                                            <td>Car Parking</td>
                                            <td>{{optional($user->carParking)->car_parking_money}}</td>
                                            <td>{{optional($user->carParking)->car_parking_money_paid_date}}</td>
                                            <td>{{optional($user->carParking)->car_parking_money_due_date}}</td>
                                            <td>{{optional($user->carParking)->car_parking_money_note}}</td>
                                        </tr>
                                        <tr>
                                            <td>Land Filling 1</td>
                                            <td>{{optional($user->landFilling1)->land_filling_money}}</td>
                                            <td>{{optional($user->landFilling1)->land_filling_money_paid_date}}</td>
                                            <td>{{optional($user->landFilling1)->land_filling_money_due_date}}</td>
                                            <td>{{optional($user->landFilling1)->land_filling_money_note}}</td>
                                        </tr>
                                        <tr>
                                            <td>Land Filling 2</td>
                                            <td>{{optional($user->landFilling2)->land_filling_money}}</td>
                                            <td>{{optional($user->landFilling2)->land_filling_money_paid_date}}</td>
                                            <td>{{optional($user->landFilling2)->land_filling_money_due_date}}</td>
                                            <td>{{optional($user->landFilling2)->land_filling_money_note}}</td>
                                        </tr>
                                        <tr>
                                            <td>Building Pilling</td>
                                            <td>{{optional($user->buildingPilling)->building_pilling_money}}</td>
                                            <td>{{optional($user->buildingPilling)->building_pilling_money_paid_date}}</td>
                                            <td>{{optional($user->buildingPilling)->building_pilling_money_due_date}}</td>
                                            <td>{{optional($user->buildingPilling)->building_pilling_money_note}}</td>

                                        </tr>
                                        <tr>
                                            <td>1st floor Roof Casting:</td>
                                            <td>{{optional($user->floorRoof)->floor_roof_casting_money_1st}}</td>
                                            <td>{{optional($user->floorRoof)->floor_roof_casting_money_paid_date_1st}}</td>
                                            <td>{{optional($user->floorRoof)->floor_roof_casting_money_due_date_1st}}</td>
                                            <td>{{optional($user->floorRoof)->floor_roof_casting_money_note_1st}}</td>
                                        </tr>
                                        <tr>
                                            <td>Finishing Work Amount:</td>
                                            <td>{{optional($user->finishingWork)->finishing_work_money}}</td>
                                            <td>{{optional($user->finishingWork)->finishing_work_money_paid_date}}</td>
                                            <td>{{optional($user->finishingWork)->finishing_work_money_due_date}}</td>
                                            <td>{{optional($user->finishingWork)->finishing_work_money_note}}</td>

                                        </tr>
                                        <tr>
                                            <td>After Handover Amount:</td>
                                            <td>{{optional($user->afterHandOverMoney)->after_handover_money}}</td>
                                            <td>{{optional($user->afterHandOverMoney)->after_handover_money_paid_date}}</td>
                                            <td>{{optional($user->afterHandOverMoney)->after_handover_money_due_date}}</td>
                                            <td>{{optional($user->afterHandOverMoney)->after_handover_money_note}}</td>

                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <section id="InstalmentHistory">
                            <div class="user-detail mt-5 p-5">
                                <div class="user-detail-info p-5">
                                    <h3>Instalment History</h3>
                                </div>

                                @php

                                    $monthCounter = 0;
                                    $yearCounter = 0;
                                    $addMonth = 1;
                                    $paymentCheck=1;

                                @endphp

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Instalment Number </th>
                                            <th>Instalment Amount</th>
                                            <th>Instalment Amount Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)

                                            @php
                                                $monthCounter++;
                                            @endphp

                                            <tr>
                                                <th>Installment {{$i+1}}</th>

                                                @if (isset($user->Installment[$i]))
                                                    <td>{{$user->Installment[$i]->installment_amount}}</td>
                                                @else
                                                    <td>{{$user->installment_year->installment_years_amount[$yearCounter]}}</td>
                                                @endif



                                                @if (isset($user->Installment[$i]))
                                                    <td>Paid: {{$user->Installment[$i]->installment_paid}}</td>
                                                @else
                                                    <td>Paid: 0</td>
                                                @endif



                                                @if (isset($user->Installment[$i]))
                                                    <td>{{$user->Installment[$i]->installment_date}}</td>
                                                @else
                                                    <td>{{$installment_paid_date->startOfMonth()}}</td>
                                                @endif










                                                @php
                                                    if($monthCounter==12)
                                                    {
                                                        $monthCounter = 0;
                                                        $yearCounter++;
                                                    }
                                                    $installment_paid_date->addMonthsNoOverflow(1)->startOfMonth();
                                                @endphp


                                            </tr>
                                        @endfor


                                    </tbody>
                                </table>
                               </div>
                        </section>
                    </div>
                  </div>
            </div>
        </div>
    </div>


</div>
@endsection















