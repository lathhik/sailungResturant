@extends('backend.master')
@section('title', 'ViewEvent')
@section('content')
    <div class="right_col" role="main" style="height: inherit">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('messages.succFail')
            <div class="x_panel">
                <div class="x_title">
                    <h2>Event Lists
                        <small>Available Events</small>
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
                            <th class="text-center">Event Name</th>
                            <th class="text-center">Event Date</th>
                            <th class="text-center">Start Date</th>
                            <th class="text-center">End Date</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($events as $event)
                            <tr>
                                <th class="text-center" width="10%">{{$loop->iteration}}</th>
                                <td>{{$event->event_name}}</td>
                                <td>{{$event->event_date}}</td>
                                <td>{{$event->start_time}}</td>
                                <td>{{$event->end_time}}</td>
                                <td>
                                    <textarea name="description" id="" cols="20"
                                              rows="5">{{$event->event_description}}</textarea>
                                </td>
                                <td>
                                    <img id="event_pic" class="event_pic" src="{{asset('custom/backend/images/event/'.$event->event_image)}}"
                                         alt="img" height="50">
                                </td>

                                <td width="30%">
                                    <a href="{{route('edit-event', $event->id)}}" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure?')"
                                       href="{{route('delete-event', $event->id)}}" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">No Event were added. Click <a class="btn btn-sm btn-danger"
                                                                               href="{{route('add-event')}}">Here</a>
                                    to add Event
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

