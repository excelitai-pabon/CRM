
@extends('master.master')

@section('logout')

<div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 align-middle me-1"></i> My Wallet</a>
    <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> Settings<span class="badge bg-success ms-auto">11</span></a>
    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline font-size-17 align-middle me-1"></i> Lock screen</a>
    <div class="dropdown-divider"></div>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <x-jet-responsive-nav-link href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-jet-responsive-nav-link>
    </form>
</div>

@endsection



@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Dashboard</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <div class="dropdown">

                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="fas fa-users" style="width:380; height:380;"></i>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Users</h5>
                        <h4 class="fw-medium font-size-24">{{$users}} </h4>
                        <div class="mini-stat-label bg-success">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{asset('assets')}}/images/services-icon/02.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Total Due</h5>
                        <h4 class="fw-medium font-size-24">{{$totalDueAmount}} </h4>
                        <div class="mini-stat-label bg-danger">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{asset('assets')}}/images/services-icon/03.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Total Paid</h5>
                        <h4 class="fw-medium font-size-24">{{$totalPaidAmount}} </h4>
                        <div class="mini-stat-label bg-info">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <img src="{{asset('assets')}}/images/services-icon/04.png" alt="">
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">Today Total Due</h5>
                        <h4 class="fw-medium font-size-24">{{$todayTotalDue}} </h4>
                        <div class="mini-stat-label bg-warning">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->








</div> <!-- container-fluid -->
@endsection
