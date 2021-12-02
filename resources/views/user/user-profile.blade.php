@extends('master.master')

@section('content')

<div class="content-wrapper">
    
        <section class="content container-fluid mt-3">
        <div style="background-color: rgb(250, 250, 250)" class="card card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <center><img style="border-radius:50%;" src="{{ Auth::user()->member_image }}" alt="image" height="150px" width="150px"></center>
              </div>
    
              <h3 style="font-weight: bold; color:rgb(4, 153, 4);" class="profile-username text-center mt-2">{{Auth::user()->member_name}}</h3>
    
              <p class="text-muted text-center">{{Auth::user()->profession}}</p>
    
              <table class="col-4 offset-4 " cellpadding="0" cellspacing="0" align="center" width="600"> <!--inspect korle dekhte pabo table center e ache-->
                <tr>
                    <td>
    
                    <!--Table for input field decoration-->
    
                    <table class="table table-bordered" cellpadding="15" cellspacing="0" width="100%">
    
    
                        <tr valign="top">
    
                            <tr>
                                <td><b>Total Taka</b></td>
                              
                                <td><div>{{optional($user->totalAmount)->total_amount}}</div></td>
                            </tr>
                            <tr>
                                <td><b> Total Paid</b> </td>
                                
                                <td>
                                    <div>
                                        {{ $total_paid }}
                                    </div>
                                </td>
                            </tr>
                            
                            
                            <tr>
                                <td><b>Total Due</b> </td>
                              
                                <td><div>{{ $total_due}}</div></td>
                            </tr>
                            <tr>
                                <td><b>File No</b> </td>
                               
                                <td><div>{{ Auth::user()->file_no }}</div></td>
                            </tr>
    
                        </tr>
    
                    </table>
    
                    </td>
                </tr>
    
            </table>
    
    
            </div>
            <!-- /.card-body -->
          </div>
        </section>
          <!-- /.card -->
    
          
    
          <div class="py-12">
            <div style="width: 1000px;" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    
                    <table style="background-color: rgb(250, 250, 250);" class="table mb-0 table-bordered">
                        <thead>
                        <tr><h4 class="bg-success p-3 mb-0 text-center">Personal Information</h4></tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">File Number</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->file_no }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Member Name</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->member_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Father Name</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->father_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Mother Name</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->mother_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Email</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Mailing Address</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->mailing_address }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Parmanent Address</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->permanent_address }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Phone Number 1</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->phone_no_1 }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Phone Number 2</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->phone_no_2 }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Date of Birth</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">NID Number</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->national_id }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Profession</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->profession }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Office Address</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->office_address }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Designation</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->designation }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Nominee Name</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->nominee_name }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Relationship With Memeber</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->relation_with_mominee }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Building Number</th>
                            <td style="padding-left: 5%;">{{ Auth::user()->building_no }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Total Amount</th>
                            <td style="padding-left: 5%;">{{optional($user->totalAmount)->total_amount}}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Number of Installment</th>
                            <td style="padding-left: 5%;">{{ optional($user->totalNoOfInstallment)->number_of_installment }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Installment Start From</th>
                            <td style="padding-left: 5%;">{{ optional($user->totalNoOfInstallment)->installment_starting_date }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Description</th>
                            <td style="padding-left: 5%;">{{ optional($user->totalNoOfInstallment)->description }}</td>
                        </tr>
                        <tr>
                            <th style="padding-left: 25%;" scope="col">Nominee Image</th>
                            <td style="padding-left: 5%;"><img src="{{  Auth::user()->nominee_image }}" alt="image" height="100px" width="100px"></td>
                        </tr>
    
                        </thead>
    
    
                    </table>
                </div>
            </div>
        </div>

        <div class="" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <section id="BasicAmount">
                <div class="user-detail mt-1 p-1">
                    <div class="user-detail-info p-3">
                        <h3>Basic Amount</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Basic Amount</th>
                                <th>Paid Amount</th>
                                <th>Paid Amount Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Booking Money</td>
                                <td>{{optional($user->bookingStatus)->booking_money}}</td>
                                <td>{{optional($user->bookingStatus)->booking_money_paid_date}}</td>
                            </tr>
                            <tr>
                                <td>Down Payment</td>
                                <td>{{optional($user->downPayment)->downpayment_money}}</td>
                                <td>{{optional($user->downPayment)->downpayment_money_paid_date}}</td>
                                
                            </tr>
                            <tr>
                                <td>Car Parking</td>
                                <td>{{optional($user->carParking)->car_parking_money}}</td>
                                <td>{{optional($user->carParking)->car_parking_money_paid_date}}</td>
                            </tr>
                            <tr>
                                <td>Land Filling 1</td>
                                <td>{{optional($user->landFilling1)->land_filling_money}}</td>
                                <td>{{optional($user->landFilling1)->land_filling_money_paid_date}}</td>
                            </tr>
                            <tr>
                                <td>Land Filling 2</td>
                                <td>{{optional($user->landFilling2)->land_filling_money}}</td>
                                <td>{{optional($user->landFilling2)->land_filling_money_paid_date}}</td>
                            </tr>
                            <tr>
                                <td>Building Pilling</td>
                                <td>{{optional($user->buildingPilling)->building_pilling_money}}</td>
                                <td>{{optional($user->buildingPilling)->building_pilling_money_paid_date}}</td>
                                
                            </tr>
                            <tr>
                                <td>1st floor Roof Casting:</td>
                                <td>{{optional($user->floorRoof)->floor_roof_casting_money_1st}}</td>
                                <td>{{optional($user->floorRoof)->floor_roof_casting_money_paid_date_1st}}</td>
                            </tr>
                            <tr>
                                <td>Finishing Work Amount:</td>
                                <td>{{optional($user->finishingWork)->finishing_work_money}}</td>
                                <td>{{optional($user->finishingWork)->finishing_work_money_paid_date}}</td>
                                
                            </tr>
                            <tr>
                                <td>After Handover Amount:</td>
                                <td>{{optional($user->afterHandOverMoney)->after_handover_money}}</td>
                                <td>{{optional($user->afterHandOverMoney)->after_handover_money_paid_date}}</td>
                                
                            </tr>
                        </tbody>
    
                    </table>
                </div>
            </section>
        </div>

        <div class="" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <section id="InstalmentHistory">
                <div class="user-detail mt-2 p-2">
                    <div class="user-detail-info p-2">
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
    
    
        
   
    
    <script src="https://kit.fontawesome.com/36feb9c31d.js" crossorigin="anonymous"></script>
    </div>

@endsection
