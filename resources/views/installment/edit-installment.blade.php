
@extends('master.master')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Validation type</h4>
                    <p class="card-title-desc">Parsley is a javascript form validation
                        library. It helps you provide your users with feedback on their form
                        submission before sending it to your server.</p>

                    <form class="custom-validation" method="POST" action="@if(Auth::guard('admin')->check()) {{route('admin.installments.edit.store',$installment->id)}} @elseif(Auth::guard('super_admin')->check()) {{route('super_admin.installments.edit.store',$installment->id)}}  @elseif(Auth::guard('employee')->check()) {{route('employee.installments.edit.store',$installment->id)}} @endif ">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Installment payment of this month</label>
                            <input type="text" name="payment" value="{{$installment->installment_amount}}" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Paid</label>
                            <input type="text" value="{{$installment->installment_paid}}" name="paid" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Due</label>
                            <input type="text" name="due" value="{{$installment->installment_due}}" class="form-control"  placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Paid Date</label>
                            <input type="date" value="{{date('Y-m-d',strtotime($installment->installment_date))}}" name="paid_date" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" name="due_date" value="{{date('Y-m-d',strtotime($installment->installment_due_date))}}" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">State</label>
                            <select class="form-select" name="payment_type"  id="validationCustom04" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="cash" {{$installment->payment_installment_type =='cash'? 'selected' : ''}}>Cash</option>
                                <option value="bank" {{$installment->payment_installment_type =='bank'? 'selected' : ''}}>Bank</option>
                                <option value="check" {{$installment->payment_installment_type =='check'? 'selected' : ''}}>Check</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Note</label>
                            <div>

                                <textarea  name="payment_note" type="text"  class="form-control" rows="5">{{$installment->installment_note}}</textarea>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->

@endsection

@section('script')
<script src="assets/js/pages/form-validation.init.js"></script>
@endsection

