
@include('body.header')
<!-- Begin page -->


<div id="layout-wrapper">



    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{route('dashboard')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets')}}/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets')}}/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="{{route('dashboard')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets')}}/logo/logo.jpg" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets')}}/logo/logo.jpg" alt="" height="28">
                        </span>
                    </a>
                </div>
            </div>

            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    {{-- <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </button> --}}
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">

                            <a href="" class="text-reset notification-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar-xs">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="mdi mdi-cart-outline"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">Your order is placed</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>
                        <div class="p-2 border-top">
                            <div class="d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    View all
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets')}}/images/users/user-4.jpg"
                            alt="Header Avatar">
                    </button>
                    @auth('admin')
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->

                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> Settings<span class="badge bg-success ms-auto">11</span></a>

                            <div class="dropdown-item d-flex align-items-center" href="#"><i class="fa fa-undo font-size-17 align-middle me-1"></i>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>



                        </div>
                    @endauth
                    @auth('employee')
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-item d-flex align-items-center" href="#"><i class="fa fa-undo font-size-17 align-middle me-1"></i>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>



                        </div>
                        </div>
                    @endauth
                    @auth('super_admin')
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-item d-flex align-items-center" href="#"><i class="fa fa-undo font-size-17 align-middle me-1"></i>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf

                                    <x-jet-responsive-nav-link href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>



                        </div>
                        </div>
                    @endauth
                    @auth('web')
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 align-middle me-1"></i> My Wallet</a>
                        <a class="dropdown-item d-flex align-items-center" href="#"><i class="mdi mdi-cog font-size-17 align-middle me-1"></i> Settings<span class="badge bg-success ms-auto">11</span></a>
                        <a class="dropdown-item" href="#"><i class="fa fa-undo font-size-17 align-middle me-1"></i> Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    </div>
                    @endauth
                </div>



            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    @include('body.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            @yield('content')
        </div>
        <!-- End Page-content -->
    </div>



@include('body.footer')

</div>
<!-- END layout-wrapper -->
