
@extends('master.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <h2 class="d-flex justify-content-center">Today All Due</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3>test</h3>
            <p>sdhfjkasjf</p>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All Admin</h4>
                        <p class="card-title-desc">Here is list of Admin. Who has the access of every thing of his CRM.</p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-white">

                                <tr>

                                    <th >Name</th>
                                    <th width="35%" >Email Address</th>
                                    <th >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($super_admins as $super_admin)
                                    <tr>

                                        <td>{{optional($super_admin->admin)->name}}</td>
                                        <td>{{optional($super_admin->admin)->email}}</td>
                                        <td class="d-flex flex-row"><a href="{{route('super_admin.powerOfAtorney.delete',optional($super_admin->admin)->id)}}" class="btn btn-warning">Deactivate</a></td>
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
                        <form class="row g-3 needs-validation"  enctype="multipart/form-data" method="POST" action="{{route('super_admin.powerOfAtorney.store')}}">
                            @csrf

                            <div class="row ">


                                <div class="col-md-6 ">
                                    <label for="validationCustom02" class="form-label">Admin Name</label>
                                    <select name="name" class="form-control">
                                        @foreach ($admins as $admin)
                                            <option value="{{$admin->id}}">{{$admin->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror

                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" name="check" type="checkbox" id="inlineCheckbox1" required value="2">
                                        <label class="form-check-label" for="inlineCheckbox1">Add as a Super Admin</label>
                                      </div>
                                    @error('email')
                                        <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add Super-Admin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection















