@extends('master.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Crm</h4>
                    <p class="card-title-desc">Parsley is a javascript form validation
                        library. It helps you provide your users with feedback on their form
                        submission before sending it to your server.</p>
                    <form class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="POST" action="{{route('super_admin.crm.update',$crm->id)}}">
                        @csrf

                        
                         <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">CRM Name</label>
                            <input type="text" class="form-control" name="name" id="validationCustom02" value="{{$crm->name}}" placeholder="CRM Name" required>
                            @error('name')
                                <span class="text-danger"> {{$message}}</span>
                             @enderror
                        </div>

                       <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <input type="text" class="form-control" value="{{$crm->address}}" name="address" id="validationCustom03" placeholder="CRM Address"  required>
                            @error('address')
                            <span class="text-danger"> {{$message}}</span>
                            @enderror

                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection



