@extends('master.master')
@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Crm</h4>
                    <p class="card-title-desc"></p>
                    <form class="row g-3 needs-validation" novalidate enctype="multipart/form-data" method="POST" action="{{route('super_admin.store.crm')}}">
                        @csrf


                         <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">CRM Name</label>
                            <input type="text" class="form-control" name="name" id="validationCustom02" placeholder="CRM Name" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                       <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" id="validationCustom03" placeholder="CRM Address"  required>
                            @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>



                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Icon</label>
                            <input type="file" class="form-control" name="icon" id="imgInp"  required>
                            @error('icon')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <img class="rounded-circle" id="image_preview"  style="width: 100px;
                            height: 100px;" src="{{asset('crm_icon/202201311312depositphotos_36753287-stock-photo-lottery.jpg')}}" alt="your image" />
                        </div>




                       <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Details</label>
                            <textarea id="textarea" class="form-control" maxlength="225" rows="4" name="details" id="validationCustom03" placeholder="CRM Details" required> </textarea>
                            {{-- <textarea id="textarea" class="form-control" maxlength="225" rows="3"></textarea> --}}
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



