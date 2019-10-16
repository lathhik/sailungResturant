@extends('backend.master')
@section('title', 'EditFood')
@section('content')
    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Food
                                <small>You can edit Food here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('update-food-action', $food->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Food Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                               name="food_name" value="{{$food->food_name}}">
                                        @if($errors->has('food_name'))
                                            <p class="text-danger">{{$errors->first('food_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Food Price
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="food_price"
                                               value="{{$food->food_price}}"
                                               class="form-control col-md-7 col-xs-12">
                                        @if($errors->has('food_price'))
                                            <p class="text-danger">{{$errors->first('food_price')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label
                                        class="control-label col-md-3 col-sm-3 col-xs-12">Food
                                        Type
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkbox">
                                            <label>
                                                @foreach($food_types as $food_type)
                                                    <input type="checkbox" value="{{$food_type->id}}"
                                                           name="food_types[]"
                                                           @foreach ($food->foodFoodType as $mFoodType)
                                                           @if($mFoodType->food_type_id == $food_type->id)
                                                           checked
                                                        @endif
                                                        @endforeach>{{$food_type->food_type}}
                                                    <br>
                                                @endforeach
                                            </label>
                                        </div>
                                        @if($errors->has('foods_types[]'))
                                            <p class="text-danger">{{$errors->first('foods_types[]')}}</p>
                                        @endif

                                        {{--                                        <select name="food_type[]" id="select_food_types"--}}
                                        {{--                                                class="form-control col-md-7 col-xs-12"--}}
                                        {{--                                                multiple>--}}
                                        {{--                                            <option value="{{old('food_type')}}"--}}
                                        {{--                                                    class="disabled" disabled--}}
                                        {{--                                                    selected>--}}
                                        {{--                                                @if(old('food_type'))--}}
                                        {{--                                                    {{old('food_type')}}--}}
                                        {{--                                                @else--}}
                                        {{--                                                    Select Food Type--}}
                                        {{--                                                @endif--}}
                                        {{--                                            </option>--}}
                                        {{--                                            @foreach($food_types as $food_type)--}}
                                        {{--                                                <option--}}
                                        {{--                                                    value="{{$food_type->id}}">{{$food_type->food_type}}</option>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </select>--}}
                                        @if($errors->has('food_type'))
                                            <p class="text-danger">{{$errors->first('food_type')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Food
                                        Description
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="description" id="" cols="20" rows="5"
                                                  class="form-control">{{$food->description}}</textarea>
                                        @if($errors->has('description'))
                                            <p class="text-danger">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="file"
                                               name="image" value="" onchange="readURL(this);">
                                        <br><br>
                                        <img id="pro" class="pro"
                                             src="{{asset('custom/backend/images/food/'.$food->image)}}" alt="img"
                                             height="100px">
                                        @if($errors->has('image'))
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
