{{-- @extends('master.master')

@section('content')


    <div class="content-wrapper p-5">
        <!-- Content Header (Page header) -->
        <div>
            <h2>Basic Amount</h2>
        </div>
    <form method="get" action="{{route('super_admin.basic_amount.update.search')}}">
            @csrf
            <div class="row">
                <div class="form-group col">
                    <label>File Number</label><br>
                    <input type="number"  name="file_no" class="form-control" required>
                </div>

            </div>
            {{route('super_admin.basic_amount.update.search')}}

            <div class="form-group">
                <input type="submit" class="btn btn-info" style="font-size: 0.8em;" value="View" />
            </div>
        </form>
        <!-- /.content -->
    </div>
@endsection



 --}}



@extends('master.master')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Update amount</h6>

            </div>

        </div>
    </div>
    <!-- end page title -->





    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card bg-secondary">
                <div class="card-body">
                    <h4 class="card-title">Validation type</h4>
                    <p class="card-title-desc">Here you can update amounts for the users.This will be forwarded to admin for validation.</p>
                        <form method="get" action="@if (Auth::guard('super_admin')->check()) {{ route('super_admin.basic_amount.update.search') }}
                            @elseif(Auth::guard('admin')->check()) {{ route('admin.basic_amount.update.search')  }}  @elseif(Auth::guard('employee')->check()) {{ route('employee.basic_amount.update.search')  }} @endif">
                            @csrf

                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03" class="form-label">File No</label>
                            <input type="text" name="file_no" required class="form-control" id="validationCustom03" required>
                            @error('record')
                                <span class="text-danger">
                                    Please provide a valid No.
                                </span>
                            @enderror

                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Find</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>
@endsection

@section('script')
<script src="assets/js/pages/form-validation.init.js"></script>
@endsection

