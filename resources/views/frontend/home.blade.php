@extends('frontend.master')
@section('title')
    Home
@endsection
@section('content')
    <!-- Slide1 -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1"
                     style="background-image: url(custom/frontend/image/main_img3.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="fadeInDown">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            Sailung
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="{{route('menu')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Look Menu
                            </a>
                        </div>
                        <br>
                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="{{route('event-details')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                View Events
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1"
                     style="background-image: url(custom/frontend/image/main_img2.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                            data-appear="lightSpeedIn">
                            Sailung
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                            <!-- Button1 -->
                            <a href="{{route('menu')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Look Menu
                            </a>
                        </div>
                        <br>
                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="{{route('event-details')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                View Events
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1"
                     style="background-image: url(custom/frontend/image/main_img4.jpg);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="rotateInDownLeft">
							Welcome to
						</span>

                        <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                            data-appear="rotateInUpRight">
                            Sailung
                        </h2>

                        <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                            <!-- Button1 -->
                            <a href="{{route('menu')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                Look Menu
                            </a>
                        </div>
                        <br>
                        <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                            <!-- Button1 -->
                            <a href="{{route('event-details')}}" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                View Events
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

    <!-- Welcome -->
    <section class="section-welcome bg1-pattern p-t-120 p-b-105">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-t-45 p-b-30">
                    <div class="wrap-text-welcome t-center">
						<span class="tit2 t-center">
							Nepalese Restaurant
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-5">
                            Welcome
                        </h3>

                        <p class="t-center m-b-22 size3 m-l-r-auto">
                            Donec quis lorem nulla. Nunc eu odio mi. Morbi nec lobortis est. Sed fringilla, nunc sed
                            imperdiet lacinia, nisl ante egestas mi, ac facilisis ligula sem id neque.
                        </p>

                        <a href="{{route('about')}}" class="txt4">
                            Our Story
                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <div class="wrap-pic-welcome size2 bo-rad-10 hov-img-zoom m-l-r-auto">
                        <img src="{{asset('custom/frontend/image/main_2nd.jpg')}}" alt="IMG-OUR">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro -->
    <section class="section-intro">
        <div class="header-intro parallax100 t-center p-t-135 p-b-158"
             style="background-image: url(custom/frontend/image/main_discover.jpg);">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                Sailung
            </h3>
        </div>

        <div class="content-intro bg-white p-t-77 p-b-133">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="#"><img src="{{asset('custom/frontend/images/intro-01.jpg')}}" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="#"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        Romantic Restaurant
                                    </h4></a>

                                <p class="m-b-20">
                                    Phasellus lorem enim, luctus ut velit eget, con-vallis egestas eros.
                                </p>

                                <a href="#" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="#"><img src="{{asset('custom/frontend/images/intro-02.jpg')}}" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="#"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        Delicious Food
                                    </h4></a>

                                <p class="m-b-20">
                                    Aliquam eget aliquam magna, quis posuere risus ac justo ipsum nibh urna
                                </p>

                                <a href="#" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom">
                                <a href="#"><img src="{{asset('custom/frontend/images/intro-04.jpg')}}" alt="IMG-INTRO"></a>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="#"><h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                        Red Wines You Love
                                    </h4></a>

                                <p class="m-b-20">
                                    Sed ornare ligula eget tortor tempor, quis porta tellus dictum.
                                </p>

                                <a href="#" class="txt4">
                                    Learn More
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Our menu -->
    <section class="section-ourmenu bg2-pattern p-t-115 p-b-120">
        <div class="container">
            <div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Discover
				</span>

                <h3 class="tit5 t-center m-t-2">
                    Our Menu
                </h3>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6">
                        {{--                        @foreach($foodTypes['lunch'] as $lunch)--}}
                        <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="{{asset('custom/frontend/image/lunch_discover_edt.jpg')}}" alt="IMG-MENU"
                                >

                                <!-- Button2 -->
                                <a href="{{route('menu')}}" class="btn2 flex-c-m txt5 ab-c-m size4">
                                    Lunch
                                </a>
                            </div>
                            {{--                                @break;--}}
                            {{--                            @endforeach--}}
                        </div>

                        @foreach($foodTypes['dinner'] as $dinner)
                            <div class="col-sm-6">
                                <!-- Item our menu -->
                                <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                    <img src="{{asset('custom/backend/images/food/'.$dinner->image)}}" alt="IMG-MENU">

                                    <!-- Button2 -->
                                    <a href="#" class="btn2 flex-c-m txt5 ab-c-m size5">
                                        Dinner
                                    </a>
                                </div>
                            </div>
                            @break;
                        @endforeach()
                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="{{asset('custom/frontend/images/our-menu-13.jpg')}}" alt="IMG-MENU">

                                <!-- Button2 -->
                                <a href="#" class="btn2 flex-c-m txt5 ab-c-m size6">
                                    Happy Hour
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="row">
                        <div class="col-12">
                            <!-- Item our menu -->
                            @foreach($drinks as $drink)
                                @if($drink->drink_name == 'khukuri rum')
                                    <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                        <img src="{{asset('custom/backend/images/drink/'.$drink->image)}}"
                                             alt="IMG-MENU">

                                        <!-- Button2 -->
                                        <a href="#" class="btn2 flex-c-m txt5 ab-c-m size7">
                                            Drink
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="{{asset('custom/frontend/images/our-menu-10.jpg')}}" alt="IMG-MENU">

                                <!-- Button2 -->
                                <a href="#" class="btn2 flex-c-m txt5 ab-c-m size8">
                                    Starters
                                </a>
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- Item our menu -->
                            <div class="item-ourmenu bo-rad-10 hov-img-zoom pos-relative m-t-30">
                                <img src="{{asset('custom/frontend/images/booking-01.jpg')}}" alt="IMG-MENU">

                                <!-- Button2 -->
                                <a href="#" class="btn2 flex-c-m txt5 ab-c-m size9">
                                    Dessert
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <!-- Event -->
    <section class="section-event">
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($events as $event)
                    <div class="item-slick2 item1-slick2"
                         @if($loop->iteration == 1)
                         style="background-image: url(custom/frontend/image/event/evnt_main1.jpg);">
                        @elseif($loop->iteration == 2)
                            style="background-image: url(custom/frontend/image/event/evnt_main3.jpg);">
                        @elseif($loop->iteration == 3)
                            style="background-image: url(custom/frontend/image/event/evnt_main2.jpg);">
                        @endif
                        <div class="wrap-content-slide2 p-t-115 p-b-208">
                            <div class="container">
                                <!-- - -->
                                <div class="title-event t-center m-b-52">
								<span class="tit2 p-l-15 p-r-15">
									Upcomming
								</span>

                                    <h3 class="tit6 t-center p-l-15 p-r-15 p-t-3">
                                        Events
                                    </h3>
                                </div>

                                <!-- Block2 -->
                                <div class="blo2 flex-w flex-str flex-col-c-m-lg animated visible-false"
                                     data-appear="zoomIn">
                                    <!-- Pic block2 -->
                                    <a href="#" class="wrap-pic-blo2 bg1-blo2"
                                       {{--                                        <img src="{{asset('custom/backend/images/event/'.$event->event_image)}}">--}}
                                       style="background-image: url({{asset('custom/backend/images/event/'.$event->event_image)}}"
                                       )>

                                        <div class="time-event size10 txt6 effect1">
										<span class="txt-effect1 flex-c-m t-center">
{{--											<h6>{{$event->event_date.' '.$event->start_time.'-'.$event->end_time}}</h6>--}}
                                            {{--											<h6>{{\Carbon\Carbon::parse($event->event_date)}}</h6>--}}
                                            @php
                                                $dt = strtotime($event->event_date);
                                                $st = strtotime($event->start_time);
                                                $et = strtotime($event->end_time);
                                                 echo '<h6>'.date('H:i',$st).'-'.date('H:i',$et).' '.date('l - j F - Y', $dt).'<h6>';
                                            @endphp
										</span>
                                        </div>
                                    </a>

                                    <!-- Text block2 -->
                                    <div class="wrap-text-blo2 flex-col-c-m p-l-40 p-r-40 p-t-45 p-b-30">
                                        <h4 class="tit7 t-center m-b-10">
                                            {{$event->event_name}}
                                        </h4>

                                        <p class="t-center">
                                            {{Str::limit($event->event_description, 100)}}
                                        </p>

                                        <div class="flex-sa-m flex-w w-full m-t-40">
                                            <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 ">
												@php
                                                    $time_now  = \Carbon\Carbon::now('Asia/Kathmandu');
                                                    $event_time = \Carbon\Carbon::parse($event->event_date);
                                                    $diff = $time_now->floatDiffInRealSeconds($event_time);
                                                    $days = (int)($diff/(60*60*24));
                                                    echo $days;
                                                @endphp
											</span>

                                                <span class="dis-block t-center txt8">
												Days
											</span>
                                            </div>

                                            <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2">
                                                @php
                                                    $time_now  = \Carbon\Carbon::now('Asia/Kathmandu');
                                                    $event_time = \Carbon\Carbon::parse($event->event_date);
                                                    $diff = $time_now->floatDiffInRealSeconds($event_time);
                                                    $remain = ($diff%(60*60*24));
                                                    $hr = (int)($remain/(60*60));
                                                    echo $hr;
                                                @endphp
											</span>

                                                <span class="dis-block t-center txt8">
												Hours
											</span>
                                            </div>

                                            <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2">
                                                	@php
                                                        $time_now  = \Carbon\Carbon::now('Asia/Kathmandu');
                                                        $event_time = \Carbon\Carbon::parse($event->event_date);
                                                        $diff = $time_now->floatDiffInRealSeconds($event_time);
                                                        $remain2 = $remain%(60*60);
                                                        $min =(int)($remain2/60);
                                                        echo $min;
                                                    @endphp
											</span>
                                                <span class="dis-block t-center txt8">
												Minutes
											</span>
                                            </div>

                                            <div class="size11 flex-col-c-m">
											<span class="dis-block t-center txt7 m-b-2 seconds">
													@php
                                                        $time_now  = \Carbon\Carbon::now('Asia/Kathmandu');
                                                        $event_time = \Carbon\Carbon::parse($event->event_date);
                                                        $diff = $time_now->floatDiffInRealSeconds($event_time);
                                                        $remain3 = $remain2%(60);
                                                        //$min =(int)($remain2/60);
                                                        echo $remain3;
                                                    @endphp
											</span>

                                                <span class="dis-block t-center txt8">
												Seconds
											</span>
                                            </div>
                                        </div>

                                        <a href="{{route('event-details')}}" class="txt4 m-t-40">
                                            View Details
                                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="wrap-slick2-dots"></div>
        </div>
    </section>

    <!-- Review -->
    <section class="section-review p-t-115">
        <!-- - -->
        <div class="title-review t-center m-b-2">
			<span class="tit2 p-l-15 p-r-15">
				Customers Say
			</span>

            <h3 class="tit8 t-center p-l-20 p-r-15 p-t-3">
                Review
            </h3>
        </div>

        <!-- - -->
        <div class="wrap-slick3">
            <div class="slick3">
                <div class="item-slick3 item1-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false"
                                 data-appear="zoomIn">
                                <img src="{{asset('custom/frontend/images/avatar-01.jpg')}}" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “ We are lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus sem,
                                    mattis in pre-tium nec, fermentum viverra dui ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32"
                                     data-appear="fadeInUp">
                                    Marie Simmons ˗ New York
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick3 item2-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false"
                                 data-appear="zoomIn">
                                <img src="{{asset('custom/frontend/images/avatar-05.jpg')}}" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “ We are lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus sem,
                                    mattis in pre-tium nec, fermentum viverra dui ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32"
                                     data-appear="fadeInUp">
                                    Marie Simmons ˗ New York
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-slick3 item3-slick3">
                    <div class="wrap-content-slide3 p-b-50 p-t-50">
                        <div class="container">
                            <div class="pic-review size14 bo4 wrap-cir-pic m-l-r-auto animated visible-false"
                                 data-appear="zoomIn">
                                <img src="{{asset('custom/frontend/images/avatar-05.jpg')}}" alt="IGM-AVATAR">
                            </div>

                            <div class="content-review m-t-33 animated visible-false" data-appear="fadeInUp">
                                <p class="t-center txt12 size15 m-l-r-auto">
                                    “ We are lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tellus sem,
                                    mattis in pre-tium nec, fermentum viverra dui ”
                                </p>

                                <div class="star-review fs-18 color0 flex-c-m m-t-12">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                    <i class="fa fa-star p-l-1" aria-hidden="true"></i>
                                </div>

                                <div class="more-review txt4 t-center animated visible-false m-t-32"
                                     data-appear="fadeInUp">
                                    Marie Simmons ˗ New York
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="wrap-slick3-dots m-t-30"></div>
        </div>
    </section>


    <!-- Video -->
    <section class="section-video parallax100"
             style="background-image: url(custom/frontend/image/about_video.jpg);">
        <div class="content-video t-center p-t-225 p-b-250">
			<span class="tit2 p-l-15 p-r-15">
				Discover
			</span>

            <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
                Our Video
            </h3>

            <div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal"
                 data-target="#modal-video-01">
                <div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
                    <i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </section>


    <!-- Blog -->
    <section class="section-blog bg-white p-t-115 p-b-123">
        <div class="container">
            <div class="title-section-ourmenu t-center m-b-22">
				<span class="tit2 t-center">
					Latest News
				</span>

                <h3 class="tit5 t-center m-t-2">
                    The Blog
                </h3>
            </div>

            <div class="row">
                @foreach($latest_blogs as $blog)
                    <div class="col-md-4 p-t-30">
                        <!-- Block1 -->
                        <div class="blo1">
                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                                <a href="{{route('blog-details', $blog->slug)}}"><img
                                        src="{{asset('custom/backend/images/blog/'.$blog->image)}}"
                                        alt="IMG-INTRO"></a>

                                <div class="time-blog">
                                    {{$blog->created_at->day}} {{$blog->created_at->shortMonthName}} {{$blog->created_at->year}}
                                </div>
                            </div>

                            <div class="wrap-text-blo1 p-t-35">
                                <a href="{{route('blog-details', $blog->slug)}}"><h4
                                        class="txt5 color0-hov trans-0-4 m-b-13">
                                        {{$blog->title}}
                                    </h4></a>

                                <p class="m-b-20">
                                    {!!str_limit( $blog->description,100) !!}
                                </p>

                                <br>
                                <a href="{{route('blog-details', $blog->slug)}}" class="txt4">
                                    Continue Reading
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>


    <!-- Sign up -->
    <div class="section-signup bg1-pattern p-t-85 p-b-85" id="special-signup">
        <div style="" class="d-flex justify-content-center">@include('messages.succFail')</div>
        <form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5" method="post" action="{{route('special-signup')}}">
            @csrf
            <span class="txt5 m-10">
				Specials Sign up
			</span>

            <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email"
                       placeholder="Email Adrress">
                <i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
                @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                @endif
            </div>

            <!-- Button3 -->
            <button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
                Sign-up
            </button>
        </form>
    </div>


@endsection()


