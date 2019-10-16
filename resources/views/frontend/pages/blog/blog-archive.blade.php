@extends('frontend.master')
@section('title')
    BlogArchive
@endsection()
@section('content')
    <!-- Slide1 -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($pop_blogs as $pop_blog)
                    <div class="item-slick1 item1-slick1"
                         style="background-image: url({{asset('custom/backend/images/blog/'.$pop_blog->image)}});">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">

                            <h4 class="t-center event_name"><b>{{ucwords($pop_blog->title)}}</b></h4>
                            <br>
                            <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                                <!-- Button1 -->

                                <a href="{{route('blog-details',$pop_blog->slug)}}"
                                   class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    View Blog
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="wrap-slick1-dots"></div>
        </div>
    </section>

    <!-- Content page -->
    <section>
        <div class="bread-crumb bo5-b p-t-17 p-b-17">
            <div class="container">
                <a href="{{route('home')}}" class="txt27">
                    Home
                </a>

                <span class="txt29 m-l-10 m-r-10">/</span>

                <span class="txt29">
					Blog
				</span>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="p-t-80 p-b-124 bo5-r h-full p-r-50 p-r-0-md bo-none-md">
                    @foreach($blogs as $blog)
                        <!-- Block4 -->
                            <div class="blo4 p-b-63">
                                <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                    <a href="blog-detail.html">
                                        <img src="{{asset('custom/backend/images/blog/'.$blog->image)}}" alt="IMG-BLOG">
                                    </a>
                                    @php
                                        $date_time = \Carbon\Carbon::parse($blog->created_at)
                                    @endphp
                                    <div class="date-blo4 flex-col-c-m">
									<span class="txt30 m-b-4">
										{{$date_time->day}}
									</span>
                                        <span class="txt31">
                                            {{$date_time->shortMonthName}}, {{$date_time->year}}
									</span>
                                    </div>
                                </div>

                                <div class="text-blo4 p-t-33">
                                    <h4 class="p-b-16">
                                        <a href="{{route('blog-details',$blog->slug)}}"
                                           class="tit9">{{$blog->title}}</a>
                                    </h4>

                                    <div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                        <span>
                                            {{$date_time->day}} {{$date_time->monthName}}, {{$date_time->year}}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                        <span>
										Cooking, Food
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                        <span>
										{{count($blog->comments)}} Comments
									</span>
                                    </div>

                                    <p>
                                        {!! str_limit($blog->description,500) !!}
                                        {{--                                        @php--}}
                                        {{--                                            echo htmlspecialchars_decode(str_limit($blog->description,500))--}}
                                        {{--                                        @endphp--}}
                                    </p>

                                    <a href="{{route('blog-details',$blog->slug)}}" class="dis-block txt4 m-t-30">
                                        Continue Reading
                                        <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        {{$blogs->links()}}
                        {{--                    <!-- Pagination -->--}}
                        {{--                        <div class="pagination flex-l-m flex-w m-l--6 p-t-25">--}}
                        {{--                            <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>--}}
                        {{--                            <a href="#" class="item-pagination flex-c-m trans-0-4">{{$blogs->links()}}</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                        <!-- Search -->
                        <div class="search-sidebar2 size12 bo2 pos-relative">
                            <input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search"
                                   placeholder="Search">
                            <button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
                        </div>

                        <!-- Categories -->
                        <div class="categories">
                            <h4 class="txt33 bo5-b p-b-35 p-t-58">
                                Categories
                            </h4>

                            <ul>
                                @foreach($blog_categories as $blog_category)
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="{{route('blog-by-category',$blog_category->id)}}" class="txt27">
                                            {{$blog_category->categories}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Most Popular -->
                        <div class="popular">
                            <h4 class="txt33 p-b-35 p-t-58">
                                Most popular
                            </h4>

                            <ul>
                                @foreach($pop_blogs as $pop_blog)
                                    <li class="flex-w m-b-25">
                                        <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                            <a href="{{route('pop-blog',$pop_blog->slug)}}">
                                                <img src="{{asset('custom/backend/images/blog/'.$pop_blog->image)}}"
                                                     alt="IMG-BLOG">
                                            </a>
                                        </div>

                                        <div class="size28">
                                            <a href="{{route('pop-blog',$pop_blog->slug)}}"
                                               class="dis-block txt28 m-b-8">
                                                {{$pop_blog->title}}
                                            </a>

                                            <span class="txt14">
											{{$pop_blog->created_at->diffForHumans()}}
										</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        <!-- Archive -->
                        <div class="archive">
                            <h4 class="txt33 p-b-20 p-t-43">
                                Archive
                            </h4>

                            <ul>
                                @foreach($archive_blogs as $ab)
                                    <li class="flex-sb-m p-t-8 p-b-8">
                                        <a href="{{route('blog-archive',$ab->month)}}" class="txt27">
                                            {{$ab->month}} {{$ab->year}}
                                        </a>

                                        <span class="txt29">
										({{$ab->data}})
									</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
