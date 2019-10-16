@extends('backend.master')
@section('title', 'AddTables')
@section('content')
    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Table
                                <small>You can add Table here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('add-table-action')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Table Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                               name="table_name" value="{{old('table_name')}}">
                                        @if($errors->has('table_name'))
                                            <p class="text-danger">{{$errors->first('table_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Booking
                                        Price
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="booking_price"
                                               value="{{old('booking_price')}}"
                                               class="form-control col-md-7 col-xs-12">
                                        @if($errors->has('booking_price'))
                                            <p class="text-danger">{{$errors->first('booking_price')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Table Type
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="table_type" id="" class="form-control col-md-7 col-xs-12">
                                            <option value="{{old('table_type')}}" class="disabled" disabled
                                                    selected>
                                                @if(old('table_type'))
                                                    @foreach($table_types as $table_type)
                                                        @if(old('table_type') == $table_type->id)
                                                            {{$table_type->table_types}}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    Select Table Type
                                                @endif
                                            </option>
                                            @foreach($table_types as $table_type)
                                                <option
                                                    value="{{$table_type->id}}">{{$table_type->table_types}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('table_type'))
                                            <p class="text-danger">{{$errors->first('table_type')}}</p>
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
