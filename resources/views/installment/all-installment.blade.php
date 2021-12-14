
@extends('master.master')

@section('content')


<div class="container-fluid">



    <div class="row">
        <div class="col-lg-6">
            <h4>All Installment</h4>
        </div>
        <div class="col-lg-6 text-end">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Multi Installment
              </button>


            </div>

    </div>

    <!-- Modal -->
<div class="modal fade @error('multiPayment')show @enderror"   @error('multiPayment')style="display: block;" @enderror id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{route('super_admin.multi.installments.create.store',$user->id)}}">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Multi Installment Amount</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <input type="number" name="multiPayment" class="form-control @error('multiPayment') is-invalid @enderror">
            @error('multiPayment')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-success" type="submit">Multiple Payment</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    {{-- <div class="row">
        <div class="col-lg-6">
            <h4 class="card-title">All Installment</h4>
            <form method="POST" action="{{route('super_admin.multi.installments.create.store',$user->id)}}">
                @csrf
                <input type="number" name="multiPayment">
                <button class="btn btn-success" type="submit">Multiple Payment</button>
            </form>
        </div>

   </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">



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

                                            <td><a href="@if(Auth::guard('admin')->check()){{route('admin.installments.edit',$user->Installment[$i]->id)}} @elseif(Auth::guard('super_admin')->check()){{route('super_admin.installments.edit',$user->Installment[$i]->id)}} @elseif(Auth::guard('employee')->check()){{route('employee.installments.edit',$user->Installment[$i]->id)}} @endif" class="btn btn-success">Edit</a></td>

                                        @else

                                            @if ($paymentCheck == 1)

                                                <td><a href="@if(Auth::guard('admin')->check()) {{route('admin.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}}@elseif(Auth::guard('super_admin')->check()){{route('super_admin.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}} @elseif(Auth::guard('employee')->check()){{route('employee.installments.create',[$user->id,$i+1,$user->installment_year->installment_years_amount[$yearCounter]])}} @endif" class="btn btn-primary">Payment</a></td>
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

@section('script')

<script>
    $('#close').on('click',function()
    {
        console.log('work');
        $('#exampleModal').hide();
    });

</script>

@endsection















