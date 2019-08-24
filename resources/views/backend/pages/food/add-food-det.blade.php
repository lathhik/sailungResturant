@extends('backend.master')
@section('title', 'AddEmp')
@section('content')
    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Food Details
                                <small>You can add Food Details here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('add-food-det-action')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Food
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="food" id="" class="form-control col-md-7 col-xs-12 ">
                                            <option value="{{old('food')}}" class="disabled" disabled
                                                    selected>
                                                @if(old('food'))
                                                    {{old('food')}}
                                                @else
                                                    Select Food
                                                @endif
                                            </option>
                                            @foreach($foods as $food)
                                                <option value="{{$food->id}}">{{$food->food_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('food'))
                                            <p class="text-danger">{{$errors->first('food')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Food Type
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="food_type[]" id="select_food_det" class="form-control col-md-7 col-xs-12"
                                                multiple>
                                            <option value="{{old('food_type')}}" class="disabled" disabled
                                                    selected>
                                                @if(old('food_type'))
                                                    {{old('food_type')}}
                                                @else
                                                    Select Food Type
                                                @endif
                                            </option>
                                            @foreach($food_types as $food_type)
                                                <option value="{{$food_type->id}}">{{$food_type->food_type}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('food_type'))
                                            <p class="text-danger">{{$errors->first('food_type')}}</p>
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
