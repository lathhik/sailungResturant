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

                    <a href="{{route('event-details')}}" class="txt29">
                        Events
                    </a>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9">
                        <div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">

                            <!-- Block4 -->
                            <div class="blo4 p-b-63">
                                <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                    <a href="#">
                                        <img src="{{asset('custom/backend/images/event/'.$evnt->event_image)}}"
                                             alt="IMG-EVENT" height="400">
                                    </a>

                                    <div class="date-blo4 flex-col-c-m">

									<span class="txt30 m-b-4">
                                        @php
                                            $date = \Carbon\Carbon::parse($evnt->event_date);
                                            $stime = \Carbon\Carbon::parse($evnt->start_time);
                                            $etime = \Carbon\Carbon::parse($evnt->end_time)
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
                                        <a href="#" class="tit9">{{$evnt->event_name}}</a>
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
                                        {{$evnt->event_description}}
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                            @include('messages.succFail')
                            <form class="leave-comment p-t-10" method="post" action="{{route('book-event')}}"
                                  id="event-form-error">
                                @csrf
                                <h4 class="txt33 p-b-14">
                                    Book Event
                                </h4>

                                <p>
                                    Your email address will not be published. Required fields are marked *
                                </p>
                                <hr>
                                <br>
                                <input type="hidden" name="event_id" value="{{$evnt->id}}">
                                <div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name"
                                           placeholder="Full Name *">
                                    @if($errors->has('name'))
                                        <p class="text-danger event-error">{{$errors->first('name')}}</p>
                                    @endif
                                </div>

                                <div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email"
                                           placeholder="Email *">
                                    @if($errors->has('email'))
                                        <p class="text-danger event-error">{{$errors->first('email')}}</p>
                                    @endif
                                </div>

                                <div class="size30 bo2 bo-rad-10 m-t-3 m-b-30">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="address"
                                           placeholder="Address *">
                                    @if($errors->has('address'))
                                        <p class="text-danger event-error">{{$errors->first('address')}}</p>
                                    @endif
                                </div>

                                <div class="size30 bo2 bo-rad-10 m-t-3 m-b-30">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="tel" name="contact"
                                           placeholder="Contact *">
                                    @if($errors->has('contact'))
                                        <p class="text-danger event-error">{{$errors->first('contact')}}</p>
                                    @endif
                                </div>
                                <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <select name="person" id="" class="selection-1">
                                        <option value="" selected disabled>Select No. Of Person/s</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="2">3</option>
                                        <option value="2">4</option>
                                        <option value="2">5</option>
                                        <option value="2">6</option>
                                    </select>
                                    @if($errors->has('person'))
                                        <p class="text-danger event-error">{{$errors->first('person')}}</p>
                                    @endif
                                </div>

                                <!-- Button3 -->
                                <button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
                                    Book Event
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </section>
@endsection
