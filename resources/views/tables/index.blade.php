@extends('master.master')

@section('content')




<div class="row">
    <div class="col-12 py-5">
        <h2 class="text-center">Informations</h2>
    </div>
</div>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Justify Tabs</h4>


            <!-- Nav tabs -->
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                        <span class="d-none d-md-block">Basic Amounts</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                        <span class="d-none d-md-block">Information Table</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                    </a>
                </li>

                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab">
                        <span class="d-none d-md-block">Installment</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                    <table class="table table-editable table-nowrap align-middle table-edits border border-2">


                            <thead>

                                <tr >
                                    <th colspan="20" style="text-align: center; color:#524b86" >Installment History</th>


                                </tr>
                            </thead>
                            <thead>

                                <tr>
                                    <th>Client Name</th>
                                    <th>Flat NO</th>

                                @for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)


                                                <th>Installment {{$i+1}}</th>

                                                <th>Installment due date {{$i+1}}</th>

                                @endfor

                                            <th>Note</th>
                                        </tr>
                                    </thead>

                                    @php
                                    $monthCounter = 0;
                                    $yearCounter = 0;
                                    $addMonth = 1;
                                    $paymentCheck=1;
                                    @endphp

                                    <tbody>


                                            <tr>
                                                <td>{{$user->member_name}}</td>
                                                <td>{{$user->building_no}}</td>
                                                @for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)



                                                @if (isset($user->Installment[$i]))
                                                    <td>Paid: {{$user->Installment[$i]->installment_paid}}</td>

                                                @endif



                                                @if (isset($user->Installment[$i]))
                                                    <td>{{Carbon\Carbon::parse($user->Installment[$i]->installment_date)->format('Y-m-d')}}</td>

                                                @endif


                                            @endfor


                                            </tr>
                                            <tr>
                                                <td>{{$user->nominee_name}}</td>

                                            </tr>

                                    </tbody>

                    </table>
                </div>
                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                    <div class="table-responsive">

                        <table class="table table-editable table-nowrap align-middle table-edits border border-2">


                                <thead style="height: 65px;  font-size:22px; color:#a199d2"  >

                                    <tr  >
                                        <th  colspan="2" style="text-align: center">Basic Information</th>
                                    </tr>

                                </thead>


                            <tbody>


                                <tr>
                                    <td>File No:</td>
                                    <td>{{$user->file_no}}</td>
                                </tr>
                                <tr>
                                    <td>Applicant Name:</td>
                                    <td >{{$user->member_name}}</td>
                                </tr>
                                <tr>
                                    <td>Father/Husband Name:</td>
                                    <td >{{$user->father_name}}</td>
                                </tr>
                                <tr>
                                    <td>Mother Name:</td>
                                    <td >{{$user->mother_name}}</td>
                                </tr>
                                <tr>
                                    <td>Malling Address:</td>
                                    <td >{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Parment Address:</td>
                                    <td >{{$user->permanent_address}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile No 1:</td>
                                    <td >{{$user->phone_no_1}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile No 2:</td>
                                    <td >{{$user->phone_no_2}}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td >{{$user->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>National ID No:</td>
                                    <td>{{$user->national_id}}</td>
                                </tr>
                                <tr>
                                    <td>Profession/Occupassion:</td>
                                    <td>{{$user->profession}}</td>
                                </tr>
                                <tr>
                                    <td>Office Address:</td>
                                    <td >{{$user->office_address}}</td>
                                </tr>
                                <tr>
                                    <td>Designation:</td>
                                    <td >{{$user->designation}}</td>
                                </tr>
                                <tr>
                                    <td>Nominee:</td>
                                    <td >{{$user->nominee_name}}</td>
                                </tr>
                                <tr>
                                    <td>Relation With Applicant:</td>
                                    <td >{{$user->relation_with_mominee}}</td>
                                </tr>
                                <tr>
                                    <td>Building No:</td>
                                    <td >{{$user->building_no}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                    <div class="table-responsive">

                        <table class="table table-editable table-nowrap align-middle table-edits border border-2">

                            <center>
                                <thead style="height: 65px;  font-size:22px; color:#a199d2"  >

                                    <tr  >
                                        <th  colspan="2" style="text-align: center">Basic Information</th>
                                    </tr>

                                </thead>
                            </center>

                            <tbody>


                                <tr>
                                    <td>File No:</td>
                                    <td>{{$user->file_no}}</td>
                                </tr>
                                <tr>
                                    <td>Applicant Name:</td>
                                    <td >{{$user->member_name}}</td>
                                </tr>
                                <tr>
                                    <td>Father/Husband Name:</td>
                                    <td >{{$user->father_name}}</td>
                                </tr>
                                <tr>
                                    <td>Mother Name:</td>
                                    <td >{{$user->mother_name}}</td>
                                </tr>
                                <tr>
                                    <td>Malling Address:</td>
                                    <td >{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>Parment Address:</td>
                                    <td >{{$user->permanent_address}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile No 1:</td>
                                    <td >{{$user->phone_no_1}}</td>
                                </tr>
                                <tr>
                                    <td>Mobile No 2:</td>
                                    <td >{{$user->phone_no_2}}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td >{{$user->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr>
                                    <td>National ID No:</td>
                                    <td>{{$user->national_id}}</td>
                                </tr>
                                <tr>
                                    <td>Profession/Occupassion:</td>
                                    <td>{{$user->profession}}</td>
                                </tr>
                                <tr>
                                    <td>Office Address:</td>
                                    <td >{{$user->office_address}}</td>
                                </tr>
                                <tr>
                                    <td>Designation:</td>
                                    <td >{{$user->designation}}</td>
                                </tr>
                                <tr>
                                    <td>Nominee:</td>
                                    <td >{{$user->nominee_name}}</td>
                                </tr>
                                <tr>
                                    <td>Relation With Applicant:</td>
                                    <td >{{$user->relation_with_mominee}}</td>
                                </tr>
                                <tr>
                                    <td>Building No:</td>
                                    <td >{{$user->building_no}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                    <div class="table-responsive">

                        <table class="table table-editable table-nowrap align-middle table-edits border border-2">

                            <thead>

                                <tr >


                                    <th colspan="8" style="text-align: center">Installment History</th>


                                </tr>
                             </thead>
                             <thead>
                                <tr>
                                    <th>Installment Information</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Paid Date</th>
                                    <th>Due Date</th>

                                    <th>Note</th>
                                </tr>
                             </thead>


                             @php
                             $monthCounter = 0;
                             $yearCounter = 0;
                             $addMonth = 1;
                             $paymentCheck=1;
                             @endphp

                             <tbody>

                                @for ($i = 0; $i < optional($user->totalNoOfInstallment)->number_of_installment; $i++)

                                    @php
                                        $monthCounter++;
                                    @endphp

                                    <tr>
                                        <td>Installment {{$i+1}}</td>

                                        @if (isset($user->Installment[$i]))
                                            <td>{{$user->Installment[$i]->installment_amount}}</td>
                                        @else
                                            <td>{{$user->installment_year->installment_years_amount[$yearCounter]}}</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>{{$user->Installment[$i]->payment_installment_type}}</td>
                                        @else
                                            <td></td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>Paid: {{$user->Installment[$i]->installment_paid}}</td>
                                        @else
                                            <td>Paid: 0</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>Due: {{$user->Installment[$i]->installment_due}}</td>
                                        @else
                                            <td>Due: 0</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                        {{-- //up --}}
                                            <td>{{Carbon\Carbon::parse($user->Installment[$i]->installment_date)->format('Y-m-d')}}</td>
                                        @else
                                            <td>{{Carbon\Carbon::parse($paid_date->startOfMonth())->format('Y-m-d')}}</td>
                                        @endif

                                        @if (isset($user->Installment[$i]))
                                            <td>{{Carbon\Carbon::parse($user->Installment[$i]->installment_due_date)->format('Y-m-d')}}</td>
                                        @else
                                            <td></td>
                                        @endif







                                        @if (isset($user->Installment[$i]))
                                            <td>{{$user->Installment[$i]->installment_note}}</td>
                                        @else
                                            <td></td>
                                        @endif


                                        @php
                                            if($monthCounter==12)
                                            {
                                                $monthCounter = 0;
                                                $yearCounter++;
                                            }
                                            Carbon\Carbon::parse($paid_date->addMonthsNoOverflow(1)->startOfMonth())->format('Y-m-d');
                                        @endphp


                                    </tr>
                                @endfor


                            </tbody>

                            </table>


                    </div>
                </div>
            </div>

            <a class="btn btn-success" href="{{url('super-admin/export-excel/' . $user->id)}}">
                <i class="fas fa-download"></i>
                <span>Download Excel</span>
            </a>
            <a class="btn btn-danger" href="{{url('super-admin/member/pdf/' . $user->id)}}">
                <i class="fas fa-download"></i>
                <span>Download Pdf</span>
            </a>
        </div>

    </div>
</div>



{{-- <div class="con mb-5">


    <div class="center">
      <a class="btn" href="{{url('export-excel/' . $user->id)}}">
        <svg width="180px" height="40px" viewBox="0 0 180 40" class="border">
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
        </svg>
        <span>Download Excel</span>
    </a>
    </div>
</div> --}}




{{--
        <div class="con">
            <div class="center">
    <a class="btn" href="{{url('/member/pdf/' . $user->id)}}">
        <svg width="180px" height="40px" viewBox="0 0 180 40" class="border">
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
          <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
        </svg>
        <span>Download Pdf</span>
    </a>

</div>
</div> --}}









@endsection
