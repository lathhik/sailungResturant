@extends('frontend.master')
@section('title')
    Event
@endsection()
@section('content')
    <!-- Title Page -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($events as $event)
                    <div class="item-slick1 item1-slick1"
                         style="background-image: url({{asset('custom/backend/images/event/'.$event->event_image)}});">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 txt1 t-center animated visible-false m-b-15"
                              data-appear="fadeInDown">
							Welcome to
                        </span>

                            <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37"
                                data-appear="fadeInUp">
                                Sailung Events
                            </h2>
                            <h5 class="t-center event_name">{{ucwords($event->event_name)}}</h5>
                            <br>
                            <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                                <!-- Button1 -->
                                <a href="{{route('view-details-book-event',$event->id)}}"
                                   class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Book Event
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="wrap-slick1-dots"></div>
        </div>

        <!-- Content page -->
        <section>
            <div class="bread-crumb bo5-b p-t-17 p-b-17">
                <div class="container">
                    <a href="{{route('home')}}" class="txt27">
                        Home
                    </a>

                    <span class="txt29 m-l-10 m-r-10">/</span>

                    <span class="txt29">
					Events
				</span>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9">
                        <div class="p-t-80 p-b-124  h-full p-r-50 p-r-0-md bo-none-md">

                            <!-- Block4 -->
                            @foreach($events as $event)
                                <div class="blo4 p-b-63">
                                    <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                        <a href="{{route('view-details-book-event',$event->id)}}">
                                            <img src="{{asset('custom/backend/images/event/'.$event->event_image)}}"
                                                 alt="IMG-EVENT" height="400">
                                        </a>

                                        <div class="date-blo4 flex-col-c-m">

									<span class="txt30 m-b-4">
                                        @php
                                            $date = \Carbon\Carbon::parse($event->event_date);
                                            $stime = \Carbon\Carbon::parse($event->start_time);
                                            $etime = \Carbon\Carbon::parse($event->end_time)
                                        @endphp
                                        {{$date->day}}
									</span>

                                            <span class="txt31">
										{{$date->shortMonthName }}, {{ $date->year}}
									</span>
                                        </div>
                                    </div>

                                    <div class="text-blo4 p-t-33">
                                        <h4 class="p-b-16">
                                            <a href="{{route('view-details-book-event',$event->id)}}"
                                               class="tit9">{{$event->event_name}}</a>
                                        </h4>

                                        <div class="txt32 flex-w p-b-24">
									<span>
										by Sailung
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                            <span>
										{{$date->day}} {{$date->monthName}}, {{$date->year}}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                            <span>
										{{$stime->hour}}:{{$stime->minute}} to {{$etime->hour}}:{{$etime->minute}}
                                            </span>
                                        </div>

                                        <p>
                                            {{str_limit($event->event_description,200)}}
                                        </p>

                                        <a href="{{route('view-details-book-event',$event->id)}}"
                                           class="dis-block txt4 m-t-30">
                                            Continue Reading
                                            <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                        @endforeach
                        <!-- Pagination -->
                            {{$events->links()}}
{{--                            <div class="pagination flex-l-m flex-w m-l--6 p-t-25">--}}
{{--                                <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">--}}
{{--                                    1--}}
{{--                                </a>--}}
{{--                                <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>--}}

{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </section>
@endsection
