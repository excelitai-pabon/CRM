
@extends('master.master')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Installment</h4>
                    <h5 class="card-title">User Information</h5>
                    <p class="card-title-desc text-primary">File No: {{$user->file_no}}</p>
                    <p class="card-title-desc  text-primary">Name: {{$user->member_name}}</p>
                    <p class="card-title-desc  text-primary">Installment No: {{$installment_no}}</p>


                    <form class="custom-validation" method="POST" action="{{route('super_admin.installments.create.store',[$user->id,$installment_no,$payment])}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Installment payment of this month</label>
                            <input type="text" name="payment" value="{{$payment}}" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Paid</label>
                            <input type="text"  name="paid" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Due</label>
                            <input type="text" name="due"  class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Paid Date</label>
                            <input type="date"  name="paid_date" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" name="due_date"  class="form-control" placeholder="Type something">
                        </div>

                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">State</label>
                            <select class="form-select" name="payment_type"  id="validationCustom04" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="cash" >Cash</option>
                                <option value="bank">Bank</option>
                                <option value="check">Check</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Note</label>
                            <div>

                                <textarea  name="payment_note" type="text"  class="form-control" rows="5"></textarea>
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

