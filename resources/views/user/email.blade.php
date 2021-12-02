@extends('master.master')

@section('content')

    <div class="container-fluid">

        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">Email send to <span class="text-primary"> {{Str::ucfirst(Str::lower($user->member_name))}}  </span>
                </div>

            </div>
        </div>

        <div class="container-lg">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card" style="background: #9eb8c04f">
                        <div class="card-body">
                            <h1 class="text-center">Get in Touch</h1>
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <form class="needs-validation" novalidate action="@if(Auth::guard('super_admin')->check()) {{ route('super_admin.user.send.email') }} @elseif(Auth::guard('admin')->check()) {{ route('admin.user.send.email') }} @endif" method="post">
                                @csrf
                                <div class="row mt-5 ">
                                    <div class="col-sm-6">

                                            <label for="inputName">Name</label>
                                            <input name="name" class="form-control" placeholder="Enter Name" value="{{$user->member_name}}" required readonly>
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror

                                    </div>
                                    <div class="col-sm-6">
                                            <label for="inputEmail">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{$user->email}}" required readonly>
                                            @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <label for="inputSubject">Subject</label>
                                        <input type="text" name="subject" class="form-control" placeholder="Enter subject"  value="{{$subject}}" required>
                                        @error('subject')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="inputMessage">Message</label>
                                        <textarea name="content" rows="5" class="form-control" placeholder="Enter Your Message" required></textarea>
                                        @error('content')
                                        <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary px-5 py-2">  <i class="fa fa-paper-plane"></i> Send &nbsp; </button>
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
    <script src="{{asset('assets')}}/js/pages/form-validation.init.js"></script>
@endsection
