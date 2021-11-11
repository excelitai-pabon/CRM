
@extends('master.master')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Installment</h4>

                    
 
                    @php
                        $monthCounter = 0;
                        $yearCounter = 0;
                        $addMonth = 1;
                        $paymentCheck=1;
                    @endphp
                    
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
    
                            <thead>
                                <tr>
                                    <th>Installment Information</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Paid Date</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
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

                                            <td><a href="{{route('super_admin.installments.edit',$user->Installment[$i]->id)}}" class="btn btn-success">Edit</a></td>  

                                        @else    

                                            @if ($paymentCheck == 1)
                                                
                                                <td><a href="{{route('super_admin.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}}" class="btn btn-primary">Payment</a></td>
                                                @php
                                                    $paymentCheck=0;
                                                @endphp

                                            @else
                                                
                                                <td><a href="javascript:void(0)" class="btn btn-dark" >Payment</a></td>
                                            
                                            @endif
        
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
   
    
</div>
@endsection















