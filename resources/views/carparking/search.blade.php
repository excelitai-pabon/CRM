@extends('master.master')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Add amounts</h6>

            </div>

        </div>
    </div>
    <!-- end page title -->





    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="card bg-secondary">
                <div class="card-body">

                    <p class="card-title-desc">Here you can add Car parking ,Registration & Khajna</p>
                        <form method="GET" action=" @if (Auth::guard('super_admin')->check()) {{ route('super_admin.car.parking') }}
                            @elseif(Auth::guard('admin')->check()) {{ route('admin.car.parking')  }}  @elseif(Auth::guard('employee')->check()) {{ route('employee.car.parking')  }} @endif ">

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
