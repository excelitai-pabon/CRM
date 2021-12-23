<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>



                @auth('super_admin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub-menu ">

                            <li><a href="{{route('super_admin.all_user')}}">All User</a></li>
                            <li><a href="{{route('super_admin.add_user')}}">Add User</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-email"></i>
                            <span>Amounts</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="{{route('super_admin.basic_amount.add')}}">Add Basic Amounts</a></li>
                            <li><a href="{{route('super_admin.basicAmount')}}">Update Basic Amounts</a></li>
                            <li><a href="{{route('super_admin.show.request')}}">Basic Amounts Request</a></li>
                        </ul>
                    </li>

                @endauth

                @auth('admin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-folder"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="{{route('admin.all_user')}}">All User</a></li>
                            <li><a href="{{route('admin.add_user')}}">Add User</a></li>
                        </ul>
                    </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-folder"></i>
                        <span>Amounts</span>
                    </a>
                    <ul class="sub-menu ">
                        <li><a href="{{route('admin.basic_amount.add')}}">Add Basic Amounts</a></li>
                        <li><a href="{{route('admin.basicAmount')}}">Update Basic Amounts</a></li>


                    </ul>
                </li>
                <li >
                    <a href="{{route('admin.installments')}}" class=" waves-effect">
                        <i class="fas fa-file"></i>
                        <span>Installments</span>
                    </a>
                </li>
                <li >
                    <a href="{{route('admin.all.user.due')}}" class=" waves-effect">
                        <i class="fas fa-folder"></i>
                        <span>Today Due</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-file"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu ">
                        <li><a href="{{route('admin.daily_report')}}">Daily Report</a></li>
                        <li><a href="{{route('admin.monthly_report')}}">Monthly Report</a></li>
                        <li><a href="{{route('admin.yearly_report')}}">Yearly Report</a></li>
                        <li><a href="{{route('admin.search_report')}}">Custom Report</a></li>

                    </ul>
                </li>

                <li >
                    <a href="{{ route ('admin.custom.pdf')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Report Generate</span>
                    </a>
                </li>
                @role('manager')

                    <li>
                        <a href="{{route('admin.all-installments')}}" class=" waves-effect">
                            <i class="fas fa-file"></i>
                            <span>All Installments</span>
                        </a>

                    </li>

                    @endrole
                @endauth
                @auth('employee')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-folder"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub-menu ">

                            <li><a href="{{route('employee.all_user')}}">All User</a></li>
                            <li><a href="{{route('employee.add_user')}}">Add User</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-folder"></i>
                            <span>Amounts</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="{{route('employee.basic_amount.add')}}">Add Basic Amounts</a></li>
                            <li><a href="{{route('employee.basicAmount')}}">Update Basic Amounts</a></li>

                        </ul>
                    </li>
                    <li >
                        <a href="{{route('employee.installments')}}" class=" waves-effect">
                            <i class="fas fa-file"></i>
                            <span>Installments</span>
                        </a>
                    </li>
                    <li >
                        <a href="{{route('employee.all.user.due')}}" class=" waves-effect">
                            <i class="fas fa-folder"></i>
                            <span>Today Due</span>
                        </a>
                    </li>

                @endauth

                @auth('web')
                <li >
                    <a href="{{route('user.profile')}}" class=" waves-effect">
                        <i class="fas fa-folder"></i>
                        <span>Report</span>
                    </a>
                </li>
                @endauth








                @auth('super_admin')
                    <li >
                        <a href="{{route('super_admin.installments')}}" class=" waves-effect">
                            <i class="fas fa-file"></i>
                            <span>Installments</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-file"></i>
                            <span>Other</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="{{route('super_admin.car.parking.search')}}">Find other</a></li>
                            <li><a href="{{route('super_admin.car.parking.show')}}">View other</a></li>


                        </ul>
                    </li>

                    <li >
                        <a href="{{route('super_admin.all.user.due')}}" class=" waves-effect">
                            <i class="fas fa-folder"></i>
                            <span>Today Due</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="fas fa-folder"></i>
                            <span>CRM</span>
                        </a>
                        <ul class="sub-menu ">

                            <li><a href="{{route('super_admin.all.crm')}}">All CRM</a></li>
                            <li><a href="{{route('super_admin.add.crm')}}">Add CRM</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ti-file"></i>
                            <span>Report</span>
                        </a>
                        <ul class="sub-menu ">
                            <li><a href="{{route('super_admin.daily_report')}}">Daily Report</a></li>
                            <li><a href="{{route('super_admin.monthly_report')}}">Monthly Report</a></li>
                            <li><a href="{{route('super_admin.yearly_report')}}">Yearly Report</a></li>
                            <li><a href="{{route('super_admin.search_report')}}">Custom Report</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{route('super_admin.powerOfAtorney')}}" class="has-arrow waves-effect">
                            <i class="ti-file"></i>
                            <span>Power of atorney</span>
                        </a>

                    </li>
                    <li >
                        <a href="{{ route ('super_admin.custom.pdf')}}" class=" waves-effect">
                            <i class="ti-email"></i>
                            <span>Report Generate</span>
                        </a>
                    </li>
                    <li >
                        <a href="{{ route ('super_admin.tableshow')}}" class=" waves-effect">
                            <i class="ti-email"></i>
                            <span>Information</span>
                        </a>
                    </li>



                @endauth





                {{-- <li >
                    <a href="{{ route ('testTable')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Information</span>
                    </a>
                </li> --}}








            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>

