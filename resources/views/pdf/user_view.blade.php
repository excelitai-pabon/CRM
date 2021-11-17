
@extends('master.master')
@section('css')
   <style>


       body {
           font-family: 'Ubuntu', sans-serif;
           font-size: 16px;
           line-height: 1.6;
       }

       table {
           border: 1px solid #C9CACC;
       }
        .tablle tr td{
             width: 50%;
        }


       table tr td {
           padding: 5px 10px;
           border: 1px solid #C9CACC;
           border-right: 0px;
           border-left: 0px;

       }

       @media print {
           body {
               font-family: 'Source Sans Pro', sans-serif !important;
               font-size: 16px !important;
               line-height: 1.6 !important;
           }

           table {
               border: 0px !important;
               width: 95%;
           }


           table tr {
               border: 1px solid #C9CACC !important;
           }

           table tr th,
           table tr td {

               padding: 5px 0px 5px 10px !important;
               border-bottom: 0px !important;
               font-family: 'Source Sans Pro', sans-serif !important;

           }


           table tr td a,
           table tr th,
           table tr td b {
               color: #1F1752 !important;
               font-size: 18px !important;
           }

           table tr td b {
               padding-right: 5px !important;
           }

           .border_none tr td {
               border: 0 !important;
               border-color: #fff !important;
           }
           .br_none{
               border: 0px solid #C9CACC !important ;
           }
           .bg_red{
               color: red !important;
           }

           table tr .pl_0{
               padding: 5px 0px 5px 0px !important;

           }
       }

       @media print {
           table tr td a {
               display: none;
               height: 0px;
           }
           table tr td{
            border: none !important;
            border-color: #fff !important;
           }

       }

   </style>
@endsection
@section('content')
  <div class="content-wrapper">
       <!-- Content Header (Page header) -->
       <div class="content-header">
           <div class="container-fluid">
               <div class="row mb-2">
                   <div class="col-sm-6">
                       <h1 class="m-0">View Member Information</h1>
                   </div><!-- /.col -->
                   <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">View User</li>
                       </ol>
                   </div><!-- /.col -->
               </div><!-- /.row -->
           </div><!-- /.container-fluid -->
       </div>
       <!-- /.content-header -->
       <!-- Main content -->
       <section class="content pb-4">
           <div class="container-fluid ">


               <table width="1200"  class="table table-bordered mb-0">
                   <tr class="br_none">
                       <td style="border: 0px; padding: 0px;">
                           <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px !important;" class="tablle">
                               <tr class="br_none">

                                   <td width="50%" style="border: 0px !important;">
                                       <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border: 0px; padding-right: 20px">
                                           <tr class="br_none">
                                               <td style="border: 0px !important">
                                                   <p>Member Photo:</p>

                                               </td>
                                               {{-- <td height="120" width="120" style="border: 0px"> --}}
                                                   <p style="height: 120px; width: 120px !important;border-radius:50%;overflow:hidden;">
                                                       <img src="{{asset($user->member_image)}}" alt="" style="height:100%;width:100%;">
                                                   </p>
                                               {{-- </td> --}}
                                           </tr>
                                       </table>
                                   </td>
                                   <td width="50%" style="border: 0px; text-align: -webkit-right">
                                       <table cellpadding="0" cellspacing="0" border="0" align="right" width="100%" style="border: 0px; margin-left: 20px" class="tablle">
                                           <tr   class="br_none">
                                               <td style="border: 0px !important">
                                                   <p style="text-align: end">Nominee Photo:</p>

                                               </td>
                                               {{-- <td height="120" width="120" style="border: 0px; "> --}}
                                                   <p style=" height: 120px; width: 120px !important;border-radius:50%;overflow:hidden;">
                                                       <img src="{{asset($user->nominee_image)}}" alt="" style="height:100%;width:100%;">
                                                   </p>
                                               {{-- </td> --}}
                                           </tr>
                                       </table>
                                   </td>

                               </tr>
                           </table>
                       </td>
                   </tr>

                   <tr class="br_none">
                       <td style="border: 0px !important; padding: 0 !important;">
                           <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" class="tablle">
                            <thead style="height: 65px; font-size: larger ; color:#38a4f8" >
                                <tr >
                                    <th colspan="2" style="text-align: center">Basic Information</th>
                                </tr>
                            </thead>
                            <tr>


                            </tr>
                               <tr>
                                   <td>File No:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->file_no}}</td>
                               </tr>
                               <tr>
                                   <td>Applicant Name:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->member_name}}</td>
                               </tr>
                               <tr>
                                   <td>Father/Husband Name:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->father_name}}</td>
                               </tr>
                               <tr>
                                   <td>Mother Name:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->mother_name}}</td>
                               </tr>
                               <tr>
                                   <td>Malling Address:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->email}}</td>
                               </tr>
                               <tr>
                                   <td>Parment Address:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->permanent_address}}</td>
                               </tr>
                               <tr>
                                   <td>Mobile No 1:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->phone_no_1}}</td>
                               </tr>
                               <tr>
                                   <td>Mobile No 2:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->phone_no_2}}</td>
                               </tr>
                               <tr>
                                   <td>Date of Birth:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->date_of_birth}}</td>
                               </tr>
                               <tr>
                                   <td>Email:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->email}}</td>
                               </tr>
                               <tr>
                                   <td>National ID No:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->national_id}}</td>
                               </tr>
                               <tr>
                                   <td>Profession/Occupassion:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->profession}}</td>
                               </tr>
                               <tr>
                                   <td>Office Address:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->office_address}}</td>
                               </tr>
                               <tr>
                                   <td>Designation:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->designation}}</td>
                               </tr>
                               <tr>
                                   <td>Nominee:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->nominee_name}}</td>
                               </tr>
                               <tr>
                                   <td>Relation With Applicant:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->relation_with_mominee}}</td>
                               </tr>
                               <tr>
                                   <td>Building No:</td>
                                   <td style="border-left:1px solid #C9CACC;">{{$user->building_no}}</td>
                               </tr>



{{--                               <tr>--}}
{{--                                   <td></td>--}}
{{--                                   <td>--}}
{{--                                       <h3 style="color: red;">Total Due </h3>--}}
{{--                                   </td>--}}
{{--                               </tr>--}}
{{--                               <tr>--}}
{{--                                   <td></td>--}}
{{--                                   <td class="bg_red" style="background: red; color: #fff;border-color: red">{{$user->due_amount}} </td>--}}
{{--                               </tr>--}}

                           </table>
                       </td>
                   </tr>

               </table>



               <div style="padding-top:50
               px;" class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 style=
                            "text-align: center;
                            font-size: 20px;
                            color:#38a4f8" class="card-title">All Installment</h4>



                            @php
                                $monthCounter = 0;
                                $yearCounter = 0;
                                $addMonth = 1;
                                $paymentCheck=1;
                            @endphp

                            <div class="table-responsive">
                                <table  width="1200"  class="table table-bordered mb-0">

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
                                                    <td>{{$user->Installment[$i]->installment_date}}</td>
                                                @else
                                                    <td>{{$paid_date->startOfMonth()}}</td>
                                                @endif

                                                @if (isset($user->Installment[$i]))
                                                    <td>{{$user->Installment[$i]->installment_due_date}}</td>
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
                                                    $paid_date->addMonthsNoOverflow(1)->startOfMonth();
                                                @endphp


                                            </tr>
                                        @endfor


                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
{{--
               <table cellpadding="0" cellspacing="0" border="1" align="center" width="1000" style="border: 1px solid #C9CACC;" class="mt-4 table-bordered">
                   <tr>
                        <th colspan="8"><h2 style="text-align: center; padding: 20px 0;" class="bg-success m-0">Installment History</h2></th>
                    </tr>
                    <tr class="btn-success">
                      <th  style="padding:10px 5px;">Information</th>
                      <th  style="padding:10px 5px;">Amount</th>
                      <th  style="padding:10px 5px;">Paid</th>
                      <th  style="padding:10px 5px;">Due</th>
                      <th  style="padding:10px 5px;">Payment Type</th>
                      <th  style="padding:10px 5px;">Paid Date</th>
                      <th  style="padding:10px 5px;">Due Date</th>
                      <th  style="padding:10px 5px;">Note</th>

                    </tr>
                    <!--//2021-10-10-->
                            @php
                        $years=0;
                        $k=12;
                    @endphp
                  @for ($i = 0; $i <  $user->no_of_installment; $i++)

                    <tr>

                      <td>Installment {{ $i+1 }}</td>
                      <td>{{ $installmentYear->year_amount[$years] }} </td>
                      @php
                        if($i+1 == $k){
                            $k +=12;
                            $years +=1;
                        }
                    @endphp
                      @if(isset($ins[$i]))
                      <td >{{$ins[$i]->installment_paid}} </td>
                      <td>{{$ins[$i]->installment_due}}</td>
                        <td> {{ $ins[$i]->payment_installment }} </td>
                        <td> {{$ins[$i]->installment_date}} </td>
                        <td> {{$ins[$i]->installment_due_date}} </td>
                        <td> {{$ins[$i]->installment_note}} </td>


                      @else
                      <td>0  </td>
                      <td>0</td>
                        <td> </td>
                        <td>  </td>
                        <td> {{date('d-m-Y', strtotime("+$i months", strtotime($timeformate)))}} </td>
                        <td></td>


                      @endif

                    </tr>
                  @endfor

                  <!--//2021-10-10-->

               </table>
 --}}

               <table cellpadding="0" cellspacing="0" border="0" align="center" width="350" style="border: 0px;" class="mt-4 ">
                <tr class="br_none">
                    <td style="border:0px;">
                        <a href="{{url('member/'.$user->id.'/pdf')}}" style="padding: 12px 22px; background: #993300; font-size:18px;font-width:bold;text-decoration:none; color:#fff; border-radius:10px;margin-top: 10px;"><i class="fas fa-download"></i> Download PDF</a>
                        <a href="#" onclick="window.print()" style="padding: 12px 22px; background: #009999; font-size:18px;font-width:bold;text-decoration:none; color:#fff; border-radius:10px;margin-top: 10px;">Print</a>
                    </td>
                </tr>
            </table>
           </div>
       </section>
   </div>

@endsection
