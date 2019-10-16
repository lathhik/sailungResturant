@extends('frontend.master')
@section('title','BlogDetails')
@section('content')

    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
             style="background-image: url({{asset('custom/backend/images/blog/'.$blog->image)}})">
        <h4 class="tit6 t-center">
            {{$blog->title}}
        </h4>
    </section>


    <!-- Content page -->
    <section>
        <div class="bread-crumb bo5-b p-t-17 p-b-17">
            <div class="container">
                <a href="{{route('home')}}" class="txt27">
                    Home
                </a>

                <span class="txt29 m-l-10 m-r-10">/</span>

                <a href="{{route('blog')}}" class="txt27">
                    Blog
                </a>

                <span class="txt29 m-l-10 m-r-10">/</span>

                <span class="txt29">
					{{$blog->title}}
				</span>
            </div>
        </div>

        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-lg-9">
                    <div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
                        <!-- Block4 -->
                        <div class="blo4 p-b-63">
                            <!-- - -->
                            <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                <a href="#">
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

                            <!-- - -->
                            <div class="text-blo4 p-t-33">
                                <h4 class="p-b-16">
                                    <a href="{{route('blog-details',$blog->slug)}}" class="tit9">{{$blog->title}}</a>
                                </h4>

                                <div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                    <span>
                                        {{$date_time->day}} {{$date_time->month}}, {{$date_time->year}}
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
                                    {!! $blog->description !!}
                                </p>
                            </div>
                        </div>

                        <!-- Leave a comment -->
                        <form class="leave-comment p-t-10" id="blog-comment-form-error" method="post"
                              action="{{route('user-comment',$blog->id)}}">
                            @csrf


                            <h4 class="txt33 p-b-14">
                                Leave a Comment
                            </h4>

                            <p>
                                Your email address will not be published. Required fields are marked *
                            </p>

                            <br>

                            <div>
                                <p>
                                    @foreach($blog->comments as $comment)
                                        <strong>{{ucwords($comment->blogUser->name)}}</strong>
                                        <br>
                                        {{$comment->comments}}
                                        <br>
                                        <br>
                                    @endforeach
                                </p>
                            </div>

                            <textarea class="bo-rad-10 size29 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-40" name="comment"
                                      placeholder="Comment..."></textarea>
                            @if($errors->has('comment'))
                                <p class="text-danger">{{$errors->first('comment')}}</p>
                            @endif

                            <div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="full_name"
                                       placeholder="Full Name *">
                                @if($errors->has('full_name'))
                                    <p class="text-danger">{{$errors->first('full_name')}}</p>
                                @endif
                            </div>

                            <div class="size30 bo2 bo-rad-10 m-t-3 m-b-20">
                                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email"
                                       placeholder="Email *">
                                @if($errors->has('email'))
                                    <p class="text-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>

                            <br>
                            <!-- Button3 -->
                            <button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
                                Post Comment
                            </button>
                        </form>
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
                                @foreach($blog_categories as $blog_cat)
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="{{route('blog-by-category', $blog_cat->id)}}" class="txt27">
                                            {{$blog_cat->categories}}
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
                                            <a href="{{route('pop-blog', $pop_blog->slug)}}">
                                                <img src="{{asset('custom/backend/images/blog/'.$pop_blog->image)}}"
                                                     alt="IMG-BLOG">
                                            </a>
                                        </div>

                                        <div class="size28">
                                            <a href="{{route('pop-blog', $pop_blog->slug)}}"
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

    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>

@endsection
