@extends('backend.master')
@section('title', 'sailungRestaurant')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main"
    >
        <!-- top tiles -->
        <div class="row tile_count">
            <!------------- foods -------------->
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <button class="count_top btn btn-sm btn-danger btn-block" onclick="showTotal()">
                    <i class="fa fa-bullseye"></i> Foods
                </button>
                <div class="col-md-12">
                    <div>
                        <a onclick="showBreakfast()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top "><i class="">Breakfast</i></span></a>
                        <a onclick="showLunch()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top"><i class="">Lunch</i></span></a>

                    </div>
                    <div class="count" id="showCountBreakfast">{{count($foodTypes['breakfast'])}}
                        <small style="font-size: 28px">ITEMS</small>
                    </div>

                    <div class="count" id="showCountLunch">{{count($foodTypes['lunch'])}}
                        <small style="font-size: 28px">ITEMS</small>
                    </div>

                    <div class="count" id="showCountMeal">{{count($foodTypes['meal'])}}
                        <small style="font-size: 28px">ITEMS</small>
                    </div>

                    <div class="count" id="showCountDinner">{{count($foodTypes['dinner'])}}
                        <small style="font-size: 28px">ITEMS</small>
                    </div>

                    <div class="count" id="showCountTotal">{{$foodCount}}
                        <small style="font-size: 28px">ITEMS</small>
                    </div>
                    <div>
                        <a onclick="showMeal()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top"><i class="">Meal</i></span></a>

                        <a onclick="showDinner()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top"><i class="">Dinner</i></span></a>
                    </div>
                    <span class="count_bottom"><a href="{{route('view-food')}}" class="green">View Details </a></span>
                </div>
            </div>
            <!------------- foods -------------->


            <!------------- drinks -------------->

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span onclick="showCountTotalDrinks()" class="count_top btn btn-block btn-danger btn-sm"><i
                        class="fa fa-beer"></i> Drinks</span>
                <div class="col-md-12">
                    <div>
                        <a onclick="showHard()" href="#" class="btn btn-xs btn-primary text-center" style="width: 70px"><span
                                class="count_top "><i class="">Hard</i></span></a>
                        <a onclick="showSoft()" href="#" class="btn btn-xs btn-primary text-center" style="width: 70px"><span
                                class="count_top"><i class="">Soft</i></span></a>
                    </div>

                    <div class="count" id="showCountTotalDrinks">{{$totalDrinks}}
                        <small style="font-size: 20px">ITEMS</small>
                    </div>

                    <div class="count" id="showCountTotalHard">{{count($drinksTypes['hard drinks'])}}
                        <small style="font-size: 20px">ITEMS</small>
                    </div>
                    <div class="count" id="showCountTotalSoft">{{count($drinksTypes['soft drinks'])}}
                        <small style="font-size: 20px">ITEMS</small>
                    </div>
                    <div class="count" id="showCountTotalWine">{{count($drinksTypes['wine'])}}
                        <small style="font-size: 20px">ITEMS</small>
                    </div>
                    <div class="count" id="showCountTotalBeer">{{count($drinksTypes['beer'])}}
                        <small style="font-size: 20px">ITEMS</small>
                    </div>
                    <div>
                        <a onclick="showWine()" href="#" class="btn btn-xs btn-primary text-center" style="width: 70px"><span
                                class="count_top "><i class="">Wine</i></span></a>
                        <a onclick="showBeer()" href="#" class="btn btn-xs btn-primary text-center" style="width: 70px"><span
                                class="count_top"><i class="">Beer</i></span></a>
                    </div>
                    <span class="count_bottom"><a href="{{route('view-drink')}}" class="green">View Details </a></span>
                </div>
            </div>

            <!-------------end drinks -------------->


            <!-------------Tables -------------->

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span onclick="showCountTotalBookings()" class="count_top btn btn-danger btn-block"><i
                        class="fa fa-hotel"></i> Tables</span>
                <div class="col-md-12">
                    <div>
                        <a onclick="showSingle()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top "><i class="">Single</i></span></a>
                        <a onclick="showCouple()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top"><i class="">Couple</i></span></a>
                    </div>
                    <div class="count" id="showCountTotalBookings">{{$totalBookings}}
                        <small style="font-size: 20px">BOOKED</small>
                    </div>
                    <div class="count" id="showCountTotalSingle">{{count($bookedTables['single'])}}
                        <small style="font-size: 20px">BOOKED</small>
                    </div>
                    <div class="count" id="showCountTotalCouple">{{count($bookedTables['couple'])}}
                        <small style="font-size: 20px">BOOKED</small>
                    </div>
                    <div class="count" id="showCountTotalFamily">{{count($bookedTables['family'])}}
                        <small style="font-size: 20px">BOOKED</small>
                    </div>
                    <div class="count" id="showCountTotalGroup">{{count($bookedTables['group'])}}
                        <small style="font-size: 20px">BOOKED</small>
                    </div>
                    <div>
                        <a onclick="showFamily()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top "><i class="">Family</i></span></a>
                        <a onclick="showGroup()" href="#" class="btn btn-xs btn-primary text-center"
                           style="width: 70px"><span
                                class="count_top"><i class="">Group</i></span></a>
                    </div>
                    <span class="count_bottom"><a href="{{route('booked-tables')}}" class="green">View Details </a></span>
                </div>
            </div>

            <!------------- End Tables -------------->


            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                <div class="count">4,567</div>
                <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                <div class="count">2,315</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                <div class="count">7,325</div>
                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
        </div>

        <!-- js/styles -->

        <style>

        </style>
        <script>
            document.getElementById('showCountBreakfast').classList.add('hidden');
            document.getElementById('showCountLunch').classList.add('hidden');
            document.getElementById('showCountMeal').classList.add('hidden');
            document.getElementById('showCountDinner').classList.add('hidden');

            document.getElementById('showCountTotalSoft').classList.add('hidden');
            document.getElementById('showCountTotalHard').classList.add('hidden');
            document.getElementById('showCountTotalBeer').classList.add('hidden');
            document.getElementById('showCountTotalWine').classList.add('hidden');

            document.getElementById('showCountTotalSingle').classList.add('hidden');
            document.getElementById('showCountTotalCouple').classList.add('hidden');
            document.getElementById('showCountTotalFamily').classList.add('hidden');
            document.getElementById('showCountTotalGroup').classList.add('hidden');
        </script>
        <!-- js/styles -->


        <!-- /top tiles -->

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>Network Activities
                                <small>Graph title sub-title</small>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-right"
                                 style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div id="chart_plot_01" class="demo-placeholder"></div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                        <div class="x_title">
                            <h2>Top Campaign Performance</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-6">
                            <div>
                                <p>Facebook Campaign</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="80"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Twitter Campaign</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="60"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-6">
                            <div>
                                <p>Conventional Media</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="40"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p>Bill boards</p>
                                <div class="">
                                    <div class="progress progress_sm" style="width: 76%;">
                                        <div class="progress-bar bg-green" role="progressbar"
                                             data-transitiongoal="50"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <br/>

        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <!-- Start to do list -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>To Do List
                                    <small>Sample tasks</small>
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

                                <div class="">
                                    <ul class="to_do">
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Schedule meeting with new
                                                client </p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Create email address for
                                                new intern</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Have IT fix the network
                                                printer</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Copy backups to offsite
                                                location</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Food truck fixie locavors
                                                mcsweeney</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Food truck fixie locavors
                                                mcsweeney</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Create email address for
                                                new intern</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Have IT fix the network
                                                printer</p>
                                        </li>
                                        <li>
                                            <p>
                                                <input type="checkbox" class="flat"> Copy backups to offsite
                                                location</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End to do list -->

                    <!-- start of weather widget -->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Daily active users
                                    <small>Sessions</small>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="temperature"><b>Monday</b>, 07:30 AM
                                            <span>F</span>
                                            <span><b>C</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="weather-icon">
                                            <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="weather-text">
                                            <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="weather-text pull-right">
                                        <h3 class="degrees">23</h3>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="row weather-days">
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Mon</h2>
                                            <h3 class="degrees">25</h3>
                                            <canvas id="clear-day" width="32" height="32"></canvas>
                                            <h5>15 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Tue</h2>
                                            <h3 class="degrees">25</h3>
                                            <canvas height="32" width="32" id="rain"></canvas>
                                            <h5>12 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Wed</h2>
                                            <h3 class="degrees">27</h3>
                                            <canvas height="32" width="32" id="snow"></canvas>
                                            <h5>14 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Thu</h2>
                                            <h3 class="degrees">28</h3>
                                            <canvas height="32" width="32" id="sleet"></canvas>
                                            <h5>15 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Fri</h2>
                                            <h3 class="degrees">28</h3>
                                            <canvas height="32" width="32" id="wind"></canvas>
                                            <h5>11 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="daily-weather">
                                            <h2 class="day">Sat</h2>
                                            <h3 class="degrees">26</h3>
                                            <canvas height="32" width="32" id="cloudy"></canvas>
                                            <h5>10 <i>km/h</i></h5>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end of weather widget -->
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
