<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="wrap-menu-header gradient1 trans-0-4">
        <div class="container h-full">
            <div class="wrap_header trans-0-3">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{route('home-page')}}">
                        <img src="{{asset('custom/frontend/images/icons/sailung_logo4.png')}}" alt="IMG-LOGO"
                             data-logofixed="{{asset('custom/frontend/images/icons/sailung_logo5.png')}}">
                    </a>
                </div>

                <!-- Menu -->
                <div class="wrap_menu p-l-45 p-l-0-xl">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li class="{{Request::is('home-page')?'active':''}}">
                                <a href="{{route('home-page')}}"><span class="active">Home</span></a>
                            </li>

                            <li class="{{Request::is('menu')?'active':''}}">
                                <a href="{{route('menu')}}">Menu</a>
                            </li>

                            <li class="active">
                                <a href="{{route('reservation')}}">Reservation</a>
                            </li>

                            <li>
                                <a href="{{route('gallery')}}">Gallery</a>
                            </li>

                            <li>
                                <a href="{{route('about')}}">About</a>
                            </li>

                            <li>
                                <a href="{{route('blog')}}">Blog</a>
                            </li>

                            <li>
                                <a href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Social -->
                <div class="social flex-w flex-l-m p-r-20">
                    <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook m-l-21" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter m-l-21" aria-hidden="true"></i></a>

                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </div>
            </div>
        </div>
    </div>
</header>
