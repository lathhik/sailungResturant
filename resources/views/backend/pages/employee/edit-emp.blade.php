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
                            <h2>Edit Employee
                                <small>You can edit Employee here</small>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            @include('messages.succFail')
                            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                                  novalidate="" method="post" action="{{route('update-emp', $emp->id)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" class="form-control col-md-7 col-xs-12"
                                               name="first_name" value="{{$emp->first_name}}">
                                        @if($errors->has('first_name'))
                                            <p class="text-danger">{{$errors->first('first_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="last-name" name="last_name" value="{{$emp->last_name}}"
                                               class="form-control col-md-7 col-xs-12">
                                        @if($errors->has('last_name'))
                                            <p class="text-danger">{{$errors->first('last_name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="middle-name"
                                           class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"
                                               name="address" value="{{$emp->address}}">
                                        @if($errors->has('address'))
                                            <p class="text-danger">{{$errors->first('address')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="male"
                                                       data-parsley-multiple="gender"> &nbsp; Male &nbsp;
                                            </label>
                                            <label class="btn btn-default" data-toggle-class="btn-primary"
                                                   data-toggle-passive-class="btn-default">
                                                <input type="radio" name="gender" value="female"
                                                       data-parsley-multiple="gender"> Female
                                            </label>
                                        </div>
                                        <br>
                                        <br>
                                        @if($errors->has('gender'))
                                            <p class="text-danger">{{$errors->first('gender')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="date"
                                               name="dob" value="{{$emp->date_of_birth}}">
                                        @if($errors->has('dob'))
                                            <p class="text-danger">{{$errors->first('dob')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="text"
                                               name="contact" value="{{$emp->contact}}">
                                        @if($errors->has('contact'))
                                            <p class="text-danger">{{$errors->first('contact')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="email"
                                               name="email" value="{{$emp->email}}">
                                        @if($errors->has('email'))
                                            <p class="text-danger">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Started From
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="date"
                                               name="job_started_from" value="{{$emp->job_started_from}}">
                                        @if($errors->has('job_started_from'))
                                            <p class="text-danger">{{$errors->first('job_started_from')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Role
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="role" id="" class="form-control col-md-7 col-xs-12">
                                            <option value="{{old('role')}}" class="disabled" disabled
                                                    selected>Select
                                                Role
                                            </option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" @if($role->id == $emp->role->id) {{ 'selected' }} @endif>{{$role->role}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('role'))
                                            <p class="text-danger">{{$errors->first('role')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="number"
                                               name="salary" value="{{$emp->salary}}">
                                        @if($errors->has('salary'))
                                            <p class="text-danger">{{$errors->first('salary')}}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationality
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class=" form-control col-md-7 col-xs-12" type="text"
                                               name="nationality" value="{{$emp->nationality}}">
                                        @if($errors->has('nationality'))
                                            <p class="text-danger">{{$errors->first('nationality')}}</p>
                                        @endif

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">About Employee
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="about" id="" cols="30" rows="5" class=" form-control col-md-7 col-xs-12">{{$emp->about_emp}}</textarea>
                                        @if($errors->has('about'))
                                            <p class="text-danger">{{$errors->first('about')}}</p>
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
                                        <img id="pro" class="pro" src="{{asset('custom/backend/images/employee/'.$emp->image)}}" alt="img" height="100px">
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
