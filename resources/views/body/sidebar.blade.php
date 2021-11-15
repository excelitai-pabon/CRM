<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class=" waves-effect">
                        <i class="ti-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-email"></i>
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
                        <li><a href="{{route('super_admin.basicAmount')}}">Basic Amounts</a></li>

                    </ul>
                </li>


                <li >
                    <a href="{{route('super_admin.installments')}}" class=" waves-effect">
                        <i class="ti-email"></i>
                        <span>Installments</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
