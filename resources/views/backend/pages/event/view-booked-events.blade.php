@extends('backend.master')
@section('title', 'ViewBookedEvents')
@section('content')
    <div class="right_col" role="main" style="height: inherit">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('messages.succFail')
            <div class="x_panel">
                <div class="x_title">
                    <h2>Booked Event Lists
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
                            <th class="text-center">User_Name</th>
                            <th class="text-center">Event_Name</th>
                            <th class="text-center">Booking_Date</th>
                            <th class="text-center">No_of_Persons</th>
                            <th class="text-center">Booked_Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bookedEvents as $bookedEvent)
                            <tr>
                                <th class="text-center" width="10%">{{$loop->iteration}}</th>
                                <td>{{$bookedEvent->full_name}}</td>
                                <td>{{$bookedEvent->event->event_name}}</td>
                                <td>{{$bookedEvent->event->event_date}}</td>
                                <td>{{$bookedEvent->no_of_persons}}</td>
                                <td>{{$bookedEvent->created_at}}</td>

                                <td width="">
                                    <a onclick="return confirm('Are You Sure?')"
                                       href="{{route('delete-table', $bookedEvent->id)}}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">No Events were Booked yet.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

