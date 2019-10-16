@extends('frontend.master')
@section('title')
    Gallery
@endsection()
@section('content')
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
             style="background-image: url(custom/frontend/images/bg-title-page-02.jpg);">
        <h2 class="tit6 t-center">
            Gallery
        </h2>
    </section>



    <!-- Gallery -->
    <div class="section-gallery p-t-118 p-b-100">
        <div
            class="wrap-label-gallery filter-tope-group size27 flex-w flex-sb-m m-l-r-auto flex-col-c-sm p-l-15 p-r-15 m-b-60">
            <button class="label-gallery txt26 trans-0-4 is-actived" data-filter="*">
                All Photo
            </button>

            <button class="label-gallery txt26 trans-0-4" data-filter=".interior">
                Interior
            </button>

            <button class="label-gallery txt26 trans-0-4" data-filter=".food">
                Food
            </button>

            <button class="label-gallery txt26 trans-0-4" data-filter=".events">
                Events
            </button>

            <button class="label-gallery txt26 trans-0-4" data-filter=".guests">
                Vip guests
            </button>
        </div>

        <div class="wrap-gallery isotope-grid flex-w p-l-25 p-r-25">
            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom events guests">
                <img src="{{asset('custom/frontend/images/photo-gallery-13.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-13.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom food">
                <img src="{{asset('custom/frontend/images/photo-gallery-14.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-14.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom events">
                <img src="{{asset('custom/frontend/images/photo-gallery-15.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-15.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom food">
                <img src="{{asset('custom/frontend/images/photo-gallery-16.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-16.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom food">
                <img src="{{asset('custom/frontend/images/photo-gallery-17.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-17.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom interior guests">
                <img src="{{asset('custom/frontend/images/photo-gallery-18.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-18.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom interior">
                <img src="{{asset('custom/frontend/images/photo-gallery-19.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-19.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom interior">
                <img src="{{asset('custom/frontend/images/photo-gallery-20.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-20.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>

            <!-- - -->
            <div class="item-gallery isotope-item bo-rad-10 hov-img-zoom events">
                <img src="{{asset('custom/frontend/images/photo-gallery-21.jpg')}}" alt="IMG-GALLERY">

                <div class="overlay-item-gallery trans-0-4 flex-c-m">
                    <a class="btn-show-gallery flex-c-m fa fa-search" href="{{asset('custom/frontend/images/photo-gallery-21.jpg')}}"
                       data-lightbox="gallery"></a>
                </div>
            </div>
        </div>

        <div class="pagination flex-c-m flex-w p-l-15 p-r-15 m-t-24 m-b-50">
            <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
            <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
            <a href="#" class="item-pagination flex-c-m trans-0-4">3</a>
        </div>
    </div>


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
