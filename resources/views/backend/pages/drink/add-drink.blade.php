@extends('backend.master')
@section('title', 'AddDrink')
@section('content')
    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Drink
                                <small>You can add new Drink here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('add-drink-action')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Drink Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                               name="drink_name" value="{{old('drink_name')}}">
                                        @if($errors->has('drink_name'))
                                            <p class="text-danger">{{$errors->first('drink_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Drink Price
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="drink_price"
                                               value="{{old('drink_price')}}"
                                               class="form-control col-md-7 col-xs-12">
                                        @if($errors->has('drink_price'))
                                            <p class="text-danger">{{$errors->first('drink_price')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Drink Type
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="drink_type" id="" class="form-control col-md-7 col-xs-12">
                                            <option value="{{old('drink_type')}}" class="disabled" disabled
                                                    selected>
                                                @if(old('drink_type'))
                                                    {{old('drink_type')}}
                                                @else
                                                    Select Drink Type
                                                @endif
                                            </option>
                                            @foreach($drink_types as $drink_type)
                                                <option
                                                    value="{{$drink_type->id}}">{{$drink_type->drinks_types}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('drink_type'))
                                            <p class="text-danger">{{$errors->first('drink_type')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="description" id="" cols="30" rows="5" class=" form-control col-md-7 col-xs-12"></textarea>
                                        @if($errors->has('description'))
                                            <p class=" text-danger">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Image
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="file"
                                               name="image" value="{{old('image')}}">
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
