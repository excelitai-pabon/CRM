@extends('master.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-6 offset-lg-2">
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


                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Icon</label>
                            <input type="file" class="form-control" name="icon" id="imgInp" required>
                            @error('icon')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <img class="rounded-circle" id="image_preview"  style="width: 100px;
                            height: 100px;" src="{{asset('upload/crm_icon/' .$crm->icon)}}" alt="your image" />
                        </div>

                       <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Details</label>
                            <textarea id="textarea" class="form-control" maxlength="225" rows="4" value={{$crm->details}} name="details" id="validationCustom03" required>{{$crm->details}} </textarea>
                            @error('details')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">ADD CRM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



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



