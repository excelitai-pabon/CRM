@extends('master.master')
@section('content')
            <h2 style="align:center">Invoice Statement</h2>
<div class="container-fluid" id="status_field">
    <form action="@if (Auth::guard('super_admin')->check()) {{ route('super_admin.custom.pdf.find.user') }}
        @elseif(Auth::guard('admin')->check()) {{ route('admin.custom.pdf.find.user') }} @endif" method="GET">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <input type="text" name="file_no" placeholder="Enter File No" class="form-control name_list" />
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info mt-4">Submit</button>
    </form>
</div>

@endsection
