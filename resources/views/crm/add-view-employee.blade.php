@extends('master.master')
@section('css')
<link href="{{asset('assets')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('assets')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">


    <style>
       
        #image_preview,#image_preview2{
            width: 150px;
            height: 160px;
        }
        .error{
            color: red;
        }
    </style>


@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        {{-- ### Admin ### --}}
        <div class="row">
            <h3>{{$crm->name}}</h3>
            <p>{{$crm->address}}</p>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Admin</h4>
                        <p class="card-title-desc">Here is list of Admin. Who has the access of every thing of his CRM.</p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-white">
                               
                                <tr>
                                    <th >image</th>
                                    <th >Name</th>
                                    <th width="35%" >Email Address</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td><img  style="width: 50px; height:50px"  src="{{$admin->profile_photo_path ? asset($admin->profile_photo_path) : asset('assets/images/users/user-4.jpg')}}" alt="Admin Image"/></td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                          
                                        <td class="d-flex flex-row">
                                                   
                                            <a href="{{route('super_admin.crm.edit.admin',$admin->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{route('super_admin.crm.delete.admin')}}">
                                                @csrf
                                                <input type="text" name="admin_id" hidden value="{{$admin->id}}">
                                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr> 
                                    @endforeach
                               

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Admin</h4>
                        <p class="card-title-desc">Parsley is a javascript form validation
                            library. It helps you provide your users with feedback on their form
                            submission before sending it to your server.</p>
                        <form class="row g-3 needs-validation"  enctype="multipart/form-data" method="POST" action="{{route('super_admin.crm.store.admin',$crm->id)}}">
                            @csrf
    
                            <div class="row">

                            
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Admin Name</label>
                                    <input type="text" class="form-control" name="name" id="validationCustom02" placeholder="Admin Name" required>
                                    @error('name')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
        
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="validationCustom03" placeholder="Email Address"  required>
                                    @error('email')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Password"  required>
                                    @error('password')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
        
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="validationCustom03" placeholder="Confirm Password"  required>
                                    @error('confirm_password')
                                    
                                        <span class="text-danger"> {{$message}}</span>
                                    
                                    @enderror
        
                                </div>

                                
                                <div>
                                    @if (Session::has('notMatched'))
                                        <span class="text-danger">{{Session::get('notMatched')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="imgInp" class="form-label">Member Image</label>
                                    <input type="file" class="form-control" name="admin_image" id="imgInp" placeholder="Member Image" required>
                                    @error('admin_image')
                                       <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <img id="image_preview" src="{{asset('assets')}}/images/users/user-4.jpg" alt="Admin Image"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ADD ADMIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->


        {{-- ### Employee ### --}}

        <div class="row">
            
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Employee Admin</h4>
                        <p class="card-title-desc">Here is list of Employee. Who has the access of every thing of some specific things.</p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-white">
                               
                                <tr>
                                    <th >image</th>
                                    <th >Name</th>
                                    <th>Email Address</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td><img id="image_preview" style="width: 50px; height:50px"  src="{{$employee->profile_photo_path ? asset($admin->profile_photo_path) : asset('assets/images/users/user-4.jpg')}}" alt="Admin Image"/></td>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                          
                                        <td class="d-flex flex-row">
                                                   
                                            <a href="{{route('super_admin.crm.edit.employee',$employee->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{route('super_admin.crm.delete.employee')}}">
                                                @csrf
                                                <input type="text" name="employee_id" hidden value="{{$employee->id}}">
                                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr> 
                                    @endforeach
                               

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Employee</h4>
                        <p class="card-title-desc">Parsley is a javascript form validation
                            library. It helps you provide your users with feedback on their form
                            submission before sending it to your server.</p>
                        <form class="row g-3 needs-validation"  enctype="multipart/form-data" method="POST" action="{{route('super_admin.crm.store.employee',$crm->id)}}">
                            @csrf
    
                            <div class="row">

                            
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Employee Name</label>
                                    <input type="text" class="form-control" name="name" id="validationCustom02" placeholder="Employee Name" required>
                                    @error('name')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
        
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="validationCustom03" placeholder="Email Address"  required>
                                    @error('email')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
        
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="validationCustom03" placeholder="Password"  required>
                                    @error('password')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
        
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="validationCustom03" placeholder="Confirm Password"  required>
                                    @error('confirm_password')
                                    
                                        <span class="text-danger"> {{$message}}</span>
                                    
                                    @enderror
        
                                </div>

                                
                                <div>
                                    @if (Session::has('notMatched'))
                                        <span class="text-danger">{{Session::get('notMatched')}}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="imgInp" class="form-label">Member Image</label>
                                    <input type="file" class="form-control" name="employee_image" id="imgInp2" placeholder="Member Image" required>
                                    @error('employee_image')
                                       <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <img id="image_preview2" src="{{asset('assets')}}/images/users/user-4.jpg" alt="Admin Image"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Employee Designation</label>
                                <input type="text" class="form-control" name="designation" id="validationCustom02" placeholder="Employee Designation" required>
                                @error('designation')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Employee Department</label>
                                <input type="text" class="form-control" name="department" id="validationCustom03" placeholder="Employee Department"  required>
                                @error('department')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
    
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Employee Address</label>
                                <input type="text" class="form-control" name="address" id="validationCustom03" placeholder="Employee Address"  required>
                                @error('address')
                                    <span class="text-danger"> {{$message}}</span>
                                @enderror
    
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">ADD Employee</button>
                            </div>
                        </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@section('script')


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="{{asset('assets')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('assets')}}/js/pages/datatables.init.js"></script>

    <script src="{{asset('assets')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('assets')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

    <script>

        $(".show_confirm").click(function(e)
        {
            console.log('work');
            e.preventDefault();
            var form =  $(this).closest("form");
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this CRM!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your CRM file has been deleted!", {
                            icon: "success",
                            });
                            form.submit();

                        } else {
                            swal("Your imaginary file is safe!");
                        }
                });
        });
        
        

        
    </script>



    <script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // image preview user
        
        imgInp.onchange = evt => {
            
            
            const [file] = imgInp.files
            
            if (file) {
               
                image_preview.src = URL.createObjectURL(file)
            }
        }

        imgInp2.onchange = evt => {
            
            
            const [file] = imgInp2.files
            
            if (file) {
                
                image_preview2.src = URL.createObjectURL(file)
            }
        }

        
        
    </script>

@endsection
