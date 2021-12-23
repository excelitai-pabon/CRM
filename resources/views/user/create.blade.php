@extends('master.master')
@section('css')
    <style>
        #image_preview2,
        #image_preview{
            width: 150px;
            height: 160px;
        }
        .error{
            color: red;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Add User</h1>
                    <br>
                    <!--<p class="card-title-desc">Here you can create users into the CRM</p>-->
                    <form class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="POST" action="@if(Auth::guard('super_admin')->check()) {{route('super_admin.user.store')}} @elseif(Auth::guard('admin')->check()){{route('admin.user.store')}} @elseif(Auth::guard('employee')->check()){{route('employee.user.store')}} @endif">
                        @csrf


                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">File No</label>
                            <input type="text" class="form-control @error('file_no')is-invalid @enderror" name="file_no" id="validationCustom01" placeholder="File No" value="{{old('file_no')}}" required >
                            @error('file_no')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                         <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Name</label>
                            <input type="text" class="form-control @error('member_name')is-invalid @enderror" name="member_name" id="validationCustom02" placeholder="Client Name" value="{{old('member_name')}}" >
                            @error('member_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                       <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Father Name</label>
                            <input type="text" class="form-control @error('father_name')is-invalid @enderror" name="father_name" id="validationCustom03" placeholder="Father Name" value="{{old('father_name')}}" >
                            @error('father_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Mother Name</label>
                            <input type="text" class="form-control @error('mother_name')is-invalid @enderror" name="mother_name" id="validationCustom04" placeholder="Mother Name" value="{{old('mother_name')}}" >
                            @error('mother_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!--added-->

                           <div class="col-md-12">
                            <label for="validationCustom04" class="form-label">Select Relationship:</label>
                            <input name="relation_name" type="checkbox" value="husband">husband
                            <input name="relation_name" type="checkbox" value="wife">wife
                            </div>
                        <!--end-->

                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Husband / Wife Name (optional)</label>
                            <input type="text" class="form-control @error('husband_wife_name')is-invalid @enderror" name="husband_wife_name" id="validationCustom05"  placeholder="Husband / Wife Name" value="{{old('husband_wife_name')}}">
                            @error('mother_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom07" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" id="validationCustom07" placeholder="Email Address" value="{{old('email')}}" >
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Mailing Address</label>
                            <input type="text" class="form-control @error('mailing_address')is-invalid @enderror" name="mailing_address" id="validationCustom01" placeholder="Mailing Address" value="{{old('mailing_address')}}" >
                            @error('mailing_address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Permanent Address</label>
                            <input type="text" class="form-control @error('permanent_address')is-invalid @enderror" name="permanent_address" id="validationCustom01" placeholder="Permanent Address" value="{{old('permanent_address')}}" >
                            @error('permanent_address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Phone Number (1st)</label>
                            <input type="number" class="form-control  @error('phone_1')is-invalid @enderror" name="phone_1" id="validationCustom01" placeholder="Phone Number (1st)" value="{{old('phone_1')}}" >
                            @error('phone_1')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Phone Number (2nd optional)</label>
                            <input type="number" class="form-control @error('phone_2')is-invalid @enderror" name="phone_2" id="validationCustom01" placeholder="Phone Number (2nd)" value="{{old('phone_2')}}">
                            @error('phone_2')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label  class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth')is-invalid @enderror" name="date_of_birth" id="date_of_birth"  value="{{old('date_of_birth')}}" >
                            @error('date_of_birth')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nationl ID Number</label>
                            <input type="number" class="form-control @error('national_id')is-invalid @enderror" name="national_id_number" id="validationCustom01" placeholder="National" value="{{old('national_id')}}" >
                            @error('national_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Profession</label>
                            <input type="text" class="form-control @error('profession')is-invalid @enderror" name="profession" id="validationCustom01" placeholder="Profession" value="{{old('profession')}}" >
                            @error('profession')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Office Address (optional)</label>
                            <input type="text" class="form-control @error('office_address')is-invalid @enderror" name="office_address" id="validationCustom01" value="{{old('office_address')}}" placeholder="Office Address" >
                            @error('office_address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Designation (optional)</label>
                            <input type="text" class="form-control @error('designation')is-invalid @enderror" name="designation" id="validationCustom01" placeholder="Designation" value="{{old('designation')}}" >
                            @error('designation')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Nominne Name</label>
                            <input type="text" class="form-control @error('nominee_name')is-invalid @enderror" name="nominee_name" id="validationCustom01" placeholder="Nominne Name" value="{{old('nominee_name')}}" >
                            @error('nominee_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Relation With Nominne </label>
                            <input type="text" class="form-control @error('relation_with_nominee')is-invalid @enderror" name="relation_with_nominee" id="validationCustom01" placeholder="Relation with nominne" value="{{old('relation_with_nominee')}}" >
                            @error('relation_with_nominee')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Building No </label>
                            <input type="text" class="form-control @error('building_no')is-invalid @enderror" name="building_no" id="validationCustom01" placeholder="Building No" value="{{old('building_no')}}" >
                            @error('building_no')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                           <!--added-->


                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Broker Name </label>
                            <input type="text" class="form-control @error('broker_name')is-invalid @enderror" name="broker_name" id="validationCustom01" placeholder="broker_name" value="{{old('broker_name')}}">
                            @error('broker_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Broker Phone no </label>
                            <input type="text" class="form-control @error('broker_number')is-invalid @enderror" name="broker_number" id="validationCustom01" placeholder="broker_number" value="{{old('broker_number')}}" >
                            @error('broker_number')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!--end-->

                        <div class="col-md-6">
                            <label for="imgInp" class="form-label">Client Image</label>
                            <input type="file" class="form-control @error('member_image')is-invalid @enderror" name="member_image" id="imgInp" placeholder="Client Image" >
                            @error('member_image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <img id="image_preview" src="{{asset('assets')}}/images/clients/avatar11.jpg" alt="your image" />
                        </div>

                        <div class="col-md-6">
                            <label for="imgInp2" class="form-label">Client Nominee Image </label>
                            <input type="file" class="form-control @error('nominee_image')is-invalid @enderror" name="nominee_image" id="imgInp2" placeholder="Client Nominee Image" >
                            @error('nominee_image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <img id="image_preview2" src="{{asset('assets')}}/images/clients/avatar11.jpg" alt="your image" />
                        </div>

                        <div class="col-md-6">
                            <label for="password" class="form-label">Password </label>
                            <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                            <div class="icheck-primary">
                                <input type="checkbox" class="mt-2" id="remember" onclick="tooglePassword()"> &nbsp;
                                <label for="remember">
                                    Show Password
                                </label>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom001" class="form-label">Chose CRM</label>

                            <select name="crm" id="validationCustom001"  class="form-control @error('crm')is-invalid @enderror" required>
                                <option disabled selected value=''>Please Select One</option>
                                @foreach ($crms as $crm)
                                <option @if(optional(Auth::guard('admin')->user())->crm_id == $crm->id) selected @endif value="{{$crm->id}}">{{$crm->name}}</option>
                                @endforeach
                            </select>
                            @error('crm')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success" type="submit">Submit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>
<script>
    // image preview user
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            image_preview.src = URL.createObjectURL(file)
        }
    }

    // image preview niminee
    imgInp2.onchange = evt => {
        const [file] = imgInp2.files
        if (file) {
            image_preview2.src = URL.createObjectURL(file)
        }
    }
    function tooglePassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
