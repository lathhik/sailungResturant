@extends('backend.master')
@section('title', 'ViewAdmin')
@section('content')
    <div class="right_col" role="main" style="height: inherit">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('messages.succFail')
            <div class="x_panel">
                <div class="x_title">
                    <h2>Admins
                        <small>Available Admins</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th>DOB</th>
                            <th>Privilege</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($admins as $admin)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$admin->first_name}}</td>
                                <td>{{$admin->last_name}}</td>
                                <td>{{$admin->address}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->contact}}</td>
                                <td>{{$admin->gender}}</td>
                                <td>{{$admin->nationality}}</td>
                                <td>{{$admin->date_of_birth}}</td>
                                <td>{{$admin->privilege}}</td>
                                <td>
                                    <img id="pro" class="pro" src="{{asset('custom/backend/images/admin/'.$admin->image)}}" alt="img"
                                         height="50px" width="50px">
                                </td>
                                <td>
                                    @if($admin->status == 0)
                                        <a href="{{route('update-status',$admin->id)}}" class="btn btn-sm btn-danger"><i
                                                class="fa fa-times"></i></a>
                                    @else
                                        <a href="{{route('update-status',$admin->id)}}"
                                           class="btn btn-sm btn-success"><i class="fa fa-check"></i></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('edit-admin', $admin->id)}}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure?')"
                                       href="{{route('delete-admin', $admin->id)}}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">No Admins were added. Click <a href="{{route('add-admin')}}">Here</a>
                                    to add Admins
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
