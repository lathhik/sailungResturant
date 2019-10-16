@extends('backend.master')
@section('title', 'ViewTables')
@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('messages.succFail')
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tables Lists
                        <small>Available Tables</small>
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

                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center">SN</th>
                            <th class="text-center">Table_Name</th>
                            <th class="text-center">Booking_Price</th>
                            <th class="text-center">Table_Type</th>
                            <th class="text-center">Availability</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tables as $table)
                            <tr>
                                <th class="text-center" width="10%">{{$loop->iteration}}</th>
                                <td>{{$table->table_name}}</td>
                                <td>Rs. {{$table->booking_price}}</td>
                                <td>
                                    @foreach($table_types as $table_type)
                                        @if($table->table_types_id == $table_type->id)
                                            {{$table_type->table_types}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if($table->availability == 1)
                                        <a href="{{route('update-availability',$table->id)}}"><span
                                                class="btn btn-sm btn-success">Available</span></a>
                                    @else
                                        <a href="{{route('update-availability',$table->id)}}"><span
                                                class="btn btn-sm btn-danger">Booked</span></a>
                                    @endif
                                </td>

                                <td width="30%">
                                    <a href="{{route('edit-table', $table->id)}}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure?')"
                                       href="{{route('delete-table', $table->id)}}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">No Tables were added. Click <a class="btn btn-sm btn-danger"
                                                                                href="{{route('add-table')}}">Here</a>
                                    to add Table
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-right">{{$tables->links()}}</div>
        </div>
    </div>
@endsection

