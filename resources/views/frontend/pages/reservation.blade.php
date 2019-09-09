@extends('frontend.master')
@section('title')
    Reservation
@endsection()
@section('content')
    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
             style="background-image: url(custom/frontend/image/reserve1.jpg);">
        <h2 class="tit6 t-center">
            Reservation
        </h2>
    </section>


    <!-- Reservation -->
    <section class="section-reservation bg1-pattern p-t-100 p-b-113">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-b-30">
                    <div class="t-center">
						<span class="tit2 t-center">
							Reservation
						</span>

                        <h3 class="tit3 t-center m-b-35 m-t-2">
                            Book Table
                        </h3>
                    </div>
                    @include('messages.succFail')
                    <form class="wrap-form-reservation size22 m-l-r-auto" method="post"
                          action="{{route('book-table-add-user')}}" id="reservation-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Date -->
                                <span class="txt9">
									Date
								</span>

                                {{--                                <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">--}}
                                {{--                                    <input class="my-calendar bo-rad-10 sizefull txt10 p-l-20" type="text" name="date">--}}
                                {{--                                    <i class="btn-calendar fa fa-calendar ab-r-m hov-pointer m-r-18"--}}
                                {{--                                       aria-hidden="true"></i>--}}
                                {{--                                </div>--}}
                                <div class="wrap-inputdate pos-relative txt10 size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="date" name="date">
                                    <i class="ab-r-m hov-pointer m-r-18"
                                       aria-hidden="true"></i>
                                    @if($errors->has('date'))
                                        <p class="text-danger">{{$errors->first('date')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Time -->
                                <span class="txt9">
									Time
								</span>

                                <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="time" name="time"
                                           placeholder="Name">
                                    @if($errors->has('time'))
                                        <p class="text-danger">{{$errors->first('time')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- People -->
                                <span class="txt9">
									People
								</span>

                                <div class="wrap-inputpeople size12 bo2 bo-rad-10 m-t-3 m-b-23" id="t-center">
                                    <select name="table_type" id="" class="selection-1">
                                        <option value="" selected disabled>Select Table Type</option>
                                        @foreach($table_types as $table_type)
                                            <option value="{{$table_type->id}}">{{$table_type->table_types}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('table_type'))
                                        <p class="text-danger">{{$errors->first('table_type')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row" id="">
                            <div class="col-md-4">
                                <!-- Name -->
                                <span class="txt9">
									First Name
								</span>

                                <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="first_name"
                                           value="" placeholder="Name">
                                    @if($errors->has('first_name'))
                                        <p class="text-danger">{{$errors->first('first_name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Name -->
                                <span class="txt9">
									Last Name
								</span>

                                <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="last_name"
                                           placeholder="Name">
                                    @if($errors->has('last_name'))
                                        <p class="text-danger">{{$errors->first('last_name')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Phone -->
                                <span class="txt9">
									Phone
								</span>

                                <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="phone"
                                           placeholder="Phone">
                                    @if($errors->has('phone'))
                                        <p class="text-danger">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Email -->
                                <span class="txt9">
									Email
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="email"
                                           placeholder="Email">
                                    @if($errors->has('email'))
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Address -->
                                <span class="txt9">
									Address
								</span>

                                <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="address"
                                           placeholder="Address">
                                    @if($errors->has('address'))
                                        <p class="text-danger">{{$errors->first('address')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Address -->
                                <span class="txt9">
									Gender
								</span>

                                <div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
                                    <select name="gender" id="" class="selection-1">
                                        <option value="" selected disabled>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @if($errors->has('gender'))
                                        <p class="text-danger">{{$errors->first('gender')}}</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="wrap-btn-booking flex-c-m m-t-6">
                            <!-- Button3 -->
                            <button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
                                Book Table
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="info-reservation flex-w p-t-80">
                <div class="size23 w-full-md p-t-40 p-r-30 p-r-0-md">
                    <h4 class="txt5 m-b-18">
                        Reserve by Phone
                    </h4>

                    <p class="size25">
                        Donec quis euismod purus. Donec feugiat ligula rhoncus, varius nisl sed, tincidunt lectus.
                        <span class="txt25">Nulla vulputate</span>
                        , lectus vel volutpat efficitur, orci
                        <span class="txt25">lacus sodales</span>
                        sem, sit amet quam:
                        <span class="txt24">(001) 345 6889</span>
                    </p>
                </div>

                <div class="size24 w-full-md p-t-40">
                    <h4 class="txt5 m-b-18">
                        For Event Booking
                    </h4>

                    <p class="size26">
                        Donec feugiat ligula rhoncus:
                        <span class="txt24">(001) 345 6889</span>
                        , varius nisl sed, tinci-dunt lectus sodales sem.
                    </p>
                </div>

            </div>
        </div>
    </section>
@endsection
