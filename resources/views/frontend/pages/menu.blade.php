@extends('frontend.master')
@section('title')
    Menu
@endsection()
@section('content')
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
             style="background-image: url(custom/frontend/image/menu1.jpg);">
        <h2 class="tit6 t-center">
            Sailung Menu
        </h2>
    </section>


    <!-- Main menu -->
    <section class="section-mainmenu p-t-110 p-b-70 bg1-pattern">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-6 p-r-35 p-r-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            BREAKFAST
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($foodTypes['breakfast'] as $breakfast)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$breakfast->food_name }}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$breakfast->food_price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                            </div>
                        @endforeach
                    </div>


                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            LUNCH
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($foodTypes['lunch'] as $lunch)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$lunch->food_name }}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$lunch->food_price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                            </div>
                        @endforeach
                    </div>


                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            DINNER
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($foodTypes['dinner'] as $dinner)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$dinner->food_name }}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$dinner->food_price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                            </div>
                        @endforeach
                    </div>


                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Drinks
                        </h3>
                        <!-- Item mainmenu -->
                        @foreach($drinks as $drink)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$drink->drink_name}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$drink->drink_price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Sed fermentum eros vitae eros
							</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-10 col-lg-6 p-l-35 p-l-15-lg m-l-r-auto">
                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Meal
                        </h3>
                    @foreach($foodTypes['meal'] as $meal)
                        <!-- Item mainmenu -->
                            <div class="item-mainmenu m-b-36"
                            >
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$meal->food_name}}

                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$meal->food_price}}

                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                            </div>
                        @endforeach

                    </div>

                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            Sittan
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($foodTypes['sitan'] as $sittan)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$sittan->food_name}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$sittan->food_price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="wrap-item-mainmenu p-b-22">
                        <h3 class="tit-mainmenu tit10 p-b-25">
                            DESERT
                        </h3>

                        <!-- Item mainmenu -->
                        @foreach($foodTypes['desert'] as $desert)
                            <div class="item-mainmenu m-b-36">
                                <div class="flex-w flex-b m-b-3">
                                    <a href="#" class="name-item-mainmenu txt21">
                                        {{$desert->food_name}}
                                    </a>

                                    <div class="line-item-mainmenu bg3-pattern"></div>

                                    <div class="price-item-mainmenu txt22">
                                        Rs. {{$desert->food_price}}
                                    </div>
                                </div>

                                <span class="info-item-mainmenu txt23">
								Proin lacinia nisl ut ultricies posuere nulla
							</span>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!---Drinks --->
    <section class="section-lunch bgwhite">
        <div class="header-lunch parallax0 parallax100"
             style="background-image: url(custom/frontend/image/drinks1_edt.jpg);">
            <div class="bg1-overlay t-center p-t-170 p-b-165">
                <h2 class="tit4 t-center">
                    Drinks
                </h2>
            </div>
        </div>

        <div class="container">
            <div class="row p-t-108 p-b-70">
                @foreach($drinkss as $drink)
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <a href="#"><img src="{{asset('custom/backend/images/drink/'.$drink->image)}}"
                                                 alt="IMG-MENU"></a>
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a href="#" class="txt21 m-b-3">
                                    {{$drink->drink_name}}
                                </a>

                                <span class="txt23">
								Aenean pharetra tortor dui in pellentesque
							</span>

                                <span class="txt22 m-t-20">
								Rs. {{$drink->drink_price}}
							</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Lunch -->
    <section class="section-lunch bgwhite">
        <div class="header-lunch parallax0 parallax100"
             style="background-image: url(custom/frontend/image/lunch2.jpg);">
            <div class="bg1-overlay t-center p-t-170 p-b-165">
                <h2 class="tit4 t-center">
                    Lunch
                </h2>
            </div>
        </div>

        <div class="container">
            <div class="row p-t-108 p-b-70">
                @foreach($lunchs as $lunch)
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <a href="#"><img src="{{asset('custom/backend/images/food/'.$lunch->image)}}"
                                                 alt="IMG-MENU"></a>
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a href="#" class="txt21 m-b-3">
                                    {{$lunch->food_name}}
                                </a>

                                <span class="txt23">
								Aenean pharetra tortor dui in pellentesque
							</span>

                                <span class="txt22 m-t-20">
								Rs. {{$lunch->food_price}}
							</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Dinner -->
    <section class="section-dinner bgwhite">
        <div class="header-dinner parallax0 parallax100"
             style="background-image: url(custom/frontend/image/dinner2.jpg);">
            <div class="bg1-overlay t-center p-t-170 p-b-165">
                <h2 class="tit4 t-center">
                    Dinner
                </h2>
            </div>
        </div>

        <div class="container">
            <div class="row p-t-108 p-b-70">
                @foreach($dinners as $dinner)
                    <div class="col-md-8 col-lg-6 m-l-r-auto">
                        <!-- Block3 -->
                        <div class="blo3 flex-w flex-col-l-sm m-b-30"
                        >
                            <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                <a href="#"><img src="{{asset('custom/backend/images/food/'.$dinner->image)}}"
                                                 alt="IMG-MENU"></a>
                            </div>

                            <div class="text-blo3 size21 flex-col-l-m">
                                <a href="#" class="txt21 m-b-3">
                                    {{$dinner->food_name}}
                                </a>

                                <span class="txt23">
								Aenean pharetra tortor dui in pellentesque
							</span>

                                <span class="txt22 m-t-20">
								Rs. {{$dinner->food_price}}
							</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Sign up -->
    <div class="section-signup bg1-pattern p-t-85 p-b-85">
        <form class="flex-c-m flex-w flex-col-c-m-lg p-l-5 p-r-5">
			<span class="txt5 m-10">
				Specials Sign up
			</span>

            <div class="wrap-input-signup size17 bo2 bo-rad-10 bgwhite pos-relative txt10 m-10">
                <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email-address"
                       placeholder="Email Adrress">
                <i class="fa fa-envelope ab-r-m m-r-18" aria-hidden="true"></i>
            </div>

            <!-- Button3 -->
            <button type="submit" class="btn3 flex-c-m size18 txt11 trans-0-4 m-10">
                Sign-up
            </button>
        </form>
    </div>

@endsection
