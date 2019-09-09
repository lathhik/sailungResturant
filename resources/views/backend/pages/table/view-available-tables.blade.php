@extends('backend.master')
@section('title', 'ViewTables')
@section('content')
    <div class="right_col" role="main" style="height: inherit">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('messages.succFail')
            <div class="x_panel">
                <div class="x_title">
                    <h2>Search Available Tables</h2>
                    <div class="clearfix"></div>
                </div>

                @if(empty($freeTables))
                    <div class="col-md-12 col-xs-12">
                        <form class="form-horizontal form-label-left input_mask" method="post"
                              action="{{route('search-booked-table')}}">
                            @csrf
                            <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="date" class="form-control " id="inputSuccess2"
                                       placeholder="Date" name="date">
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="table_type_id" id="" class="form-control">
                                    <option value="" class="" selected disabled>Select Table Type</option>
                                    @foreach($table_types as $table_type)
                                        <option value="{{$table_type->id}}">{{$table_type->table_types}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12 form-group has-feedback">
                                <button type="submit" class="btn btn-success btn-md">Search</button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="x_content">
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="text-center">SN</th>
                                <th class="text-center">Table_Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($freeTables as $freeTable)
                                <tr>
                                    <th class="text-center" width="10%">{{$loop->iteration}}</th>
                                    <td>{{$freeTable->table_name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

