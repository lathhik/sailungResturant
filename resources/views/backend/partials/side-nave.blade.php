<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('dashboard')}}" class="site_title"><img src="{{asset('custom/backend/images/res1.ico')}}"
                                                                     alt=""><span
                    style="font-size: 19px; text-decoration: underline;font-weight: bold ;font-family: Berkshire Swash, cursive;">SailungResaturant</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('custom/backend/images/admin/'.$loggedAdmin->image)}}"
                     alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{$loggedAdmin->first_name.' '.$loggedAdmin->last_name}}</h2>
                <small>{{$loggedAdmin->privilege}}</small>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            @if($loggedAdmin->privilege != 'Admin')
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            @endif
            @if($loggedAdmin->privilege != 'Admin')
                <div class="menu_section">
                    <h3>Admin AND Employees</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-user-secret"></i> Admin <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-admin')}}">Add</a></li>
                                <li><a href="{{route('view-admin')}}">View</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-users"></i>Employees<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-emp-role')}}">Add Role</a></li>
                                <li><a href="{{route('view-emp-role')}}">View Role</a></li>
                                <li><a href="{{route('add-emp')}}">Add Employee</a></li>
                                <li><a href="{{route('view-emp')}}">View Employees</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="menu_section">
                <h3>FOOD AND DRINKS</h3>
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-bullseye"></i> Foods <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('add-food-type')}}">Add Food Type</a></li>
                            <li><a href="{{route('view-food-type')}}">View Food Type</a></li>
                            <li><a href="{{route('add-food')}}">Add Food</a></li>
                            <li><a href="{{route('view-food')}}">View Foods</a></li>
                            <li><a href="{{route('add-food-det')}}">Add Food Details</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-beer"></i>Drinks<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('add-drink')}}">Add Drinks</a></li>
                            <li><a href="{{route('view-drink')}}">View Drinks</a></li>
                            <li><a href="{{route('add-drink-type')}}">Add Drinks Type</a></li>
                            <li><a href="{{route('view-drink-type')}}">View Drinks Type</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div class="menu_section">
                <h3>Tables and Booking</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-hotel"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('add-table-type')}}">Add Table Types</a></li>
                            <li><a href="{{route('view-table-type')}}">View Table Types</a></li>
                            <li><a href="{{route('add-table')}}">Add Tables</a></li>
                            <li><a href="{{route('view-table')}}">View Tables</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-money"></i> Booking <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="page_403.html">Booked Tables</a></li>
                            <li><a href="page_404.html">Available Tables</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="menu_section">
                <h3>Events and Booking</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-calendar"></i> Events <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('add-event')}}">Add Event</a></li>
                            <li><a href="{{route('view-event')}}">View Event</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-money"></i> Booking <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('booked-tables')}}">Booked Tables</a></li>
                            <li><a href="{{route('available-tables')}}">Available Tables</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @if($loggedAdmin->privilege != 'Admin')
                <div class="menu_section">
                    <h3>Customer Feedback</h3>
                    <ul class="nav side-menu">
                        <li><a><i class="fa fa-hotel"></i> Feedback <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('view-feedback')}}">View Feedback</a></li>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('admin-logout')}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
