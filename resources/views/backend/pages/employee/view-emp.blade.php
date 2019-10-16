@extends('backend.master')
@section('title', 'ViewEmp')
@section('content')

    <div class="right_col" role="main" style="">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            @include('messages.succFail')
                            <h2>Employees List
                                <small>View</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="datatable-responsive_wrapper"
                                 class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="datatable-responsive_length">
                                            <label>Show
                                                <select
                                                    name="datatable-responsive_length"
                                                    aria-controls="datatable-responsive"
                                                    class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> entries
                                            </label>
                                        </div>
                                    </div>

                                    <form method="get" action="{{action('Backend\EmployeeController@searchAction')}}"
                                          name="search">
                                        @csrf
                                        <div class="col-sm-6">
                                            <div id="datatable-responsive_filter" class="dataTables_filter">
                                                <label><a href="">Search:</a>
                                                    <input
                                                        type="text" name="search" hidden class="form-control input-sm"
                                                        placeholder=""
                                                        aria-controls="datatable-responsive">
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <table id="datatable-responsive"
                                               class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                               cellspacing="0" width="100%" role="grid"
                                               aria-describedby="datatable-responsive_info"
                                               style="width: 100%; text-align: center!important;">
                                            <thead class="text-center">
                                            <tr role="row" class="text-center" style="text-align: center">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-responsive"
                                                    rowspan="1" colspan="1" style="
                                                    width: 71px; text-align: center" aria-sort="ascending"
                                                    aria-label="First name: activate to sort column descending">First
                                                    name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 70px; text-align: center"
                                                    aria-label="Last name: activate to sort column ascending">Last name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 155px; text-align: center"
                                                    aria-label="Position: activate to sort column ascending">Role
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 67px; text-align: center"
                                                    aria-label="Office: activate to sort column ascending">Address
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 67px; text-align: center"
                                                    aria-label="Office: activate to sort column ascending">Email
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 67px; text-align: center"
                                                    aria-label="Office: activate to sort column ascending">Contact
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 28px; text-align: center"
                                                    aria-label="Age: activate to sort column ascending">Gender
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 65px; text-align: center"
                                                    aria-label="Start date: activate to sort column ascending">Start
                                                    date
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 48px; text-align: center"
                                                    aria-label="Salary: activate to sort column ascending">Salary
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 36px; text-align: center"
                                                    aria-label="Extn.: activate to sort column ascending">Age
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 145px; text-align: center"
                                                    aria-label="E-mail: activate to sort column ascending">Nationality
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 145px; text-align: center"
                                                    aria-label="E-mail: activate to sort column ascending">Image
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 145px; text-align: center"
                                                    aria-label="E-mail: activate to sort column ascending">Status
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-responsive"
                                                    rowspan="1"
                                                    colspan="1" style="width: 145px; text-align: center"
                                                    aria-label="E-mail: activate to sort column ascending">Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($employees as $employee)
                                                <tr role="row" class="odd text-center">
                                                    <td tabindex="0" class="sorting_1">{{$employee->first_name}}</td>
                                                    <td>{{($employee->last_name)}}</td>
                                                    <td>{{ $employee->role->role}}</td>
                                                    <td>{{$employee->address}}</td>
                                                    <td>{{$employee->email}}</td>
                                                    <td>{{$employee->contact}}</td>
                                                    <td>{{$employee->gender}}</td>
                                                    <td>{{$employee->job_started_from}}</td>
                                                    <td>Rs. {{$employee->salary}}</td>
                                                    <td>
                                                        {{--                                                     @php--}}
                                                        {{--                                                            $dob =strtotime($employee->date_of_birth);--}}
                                                        {{--                                                            $now =strtotime(date('Y/m/d'));--}}
                                                        {{--                                                            $age = (($now-$dob)/60/60/24)/365;--}}
                                                        {{--                                                            $years = (int)$age;--}}
                                                        {{--                                                            print($years ) .' yrs';--}}
                                                        {{--                                                      @endphp--}}
                                                        @php
                                                            $days = abs(strtotime(now())-strtotime($employee->date_of_birth))/(60*60*24);
                                                            $age = ($days/365);
                                                        echo (int)$age. ' Yrs';
                                                        @endphp
                                                    </td>
                                                    <td>{{$employee->nationality}}</td>
                                                    <td class="text-center">
                                                        <img id="pro" class="pro"
                                                             src="{{asset('custom/backend/images/employee/'. $employee->image)}}"
                                                             alt="img" height="50px" width="50px">
                                                    </td>
                                                    <td>
                                                        @if($employee->status == 1)
                                                            <a href="{{route('update-emp-status', $employee->id)}}"
                                                               class="btn btn-sm btn-primary"><i
                                                                    class="fa fa-check"></i></a>
                                                        @else
                                                            <a href="{{route('update-emp-status', $employee->id)}}"
                                                               class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('edit-emp', $employee->id)}}"
                                                           class="btn btn-sm btn-primary"><i
                                                                class="fa fa-edit"></i>
                                                        </a>
                                                        <a onclick="return confirm('Are You Sure?')"
                                                           href="{{route('delete-emp', $employee->id)}}"
                                                           class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr role="row" class="even text-center">
                                                    <td colspan="14">
                                                        <div class="alert alert-danger">
                                                            No Employee were added. Click <a
                                                                href="{{route('add-emp')}}"><b
                                                                    class="btn btn-sm btn-primary">Here</b></a> to add
                                                            Employee.

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="dataTables_info" id="datatable-responsive_info" role="status"
                                             aria-live="polite">Showing {{$employees->count()}}
                                            of {{$employee->count()}} entries
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="datatable-responsive_paginate">
                                            <ul class="pagination">
                                                {{$employees->links()}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
