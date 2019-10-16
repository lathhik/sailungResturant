<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\Drink;
use App\models\backend\Food;
use App\models\backend\FoodType;
use App\models\frontend\BookingTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->user()->privilege != 'Admin') {

            $countFoods = $this->countAllFoods();
//            $countDrinksTypes = $this->countDrinks();
            $totalDrinks = $this->countAllDrinks();
            $totalBookings = $this->countAllBookings();

            return view('backend.pages.dashboard')
                ->with('foodCount', $countFoods)
//                ->with('countDrinksTypes', $this->countDrinks())
                ->with('totalDrinks', $totalDrinks)
                ->with('totalBookings', $totalBookings);

        }
        return view('backend.pages.admin-dashboard');
    }

    public function countAllFoods()
    {
        $foods = Food::all();
        $countAllFoods = count($foods);
        return $countAllFoods;
    }


    public function countAllDrinks()
    {
        $drinks = Drink::all();
        $countAllDrinks = count($drinks);
        return $countAllDrinks;

    }

    public function countAllBookings()
    {
        $date = date('Y-m-d');
        $bookings = BookingTable::where('booking_date', '>=', $date)->get();
        $countAllBookings = count($bookings);
        return $countAllBookings;
    }


    ##############==========================================================================################


    public function countDrinks()
    {
        if (Auth::guard('admin')->user()->privilege != 'Admin') {
            $drinksTypes = [
                'hard drinks' => $this->getDrinkType('hard drinks'),
                'soft drinks' => $this->getDrinkType('soft drinks'),
                'wine' => $this->getDrinkType('wine'),
                'beer' => $this->getDrinkType('beer')
            ];
            return view('backend.pages.dashboard')->with('drinksTypes', $drinksTypes);
        }
//        return $drinksTypes;

    }


    public function getDrinkType($types)
    {
        $dtypes = [];
        $drinks = Drink::with('drinkType')->get();

        foreach ($drinks as $drink) {
            if ($drink->drinkType->drinks_types == $types) {
                array_push($dtypes, $drink->drink_name);
            }
        }
        return $dtypes;
    }


    public function countBreakfast()
    {
        $foods = Food::with('foodFoodType')->get();
        foreach ($foods as $food) {
            return $food->foodFoodType;
        }

    }

    public function getBookedTables($tableType)
    {
        $bookings = BookingTable::all();
        $booked_table = [];
        foreach ($bookings as $booking) {
            if ($booking->table->tableType->table_types == $tableType) {
                array_push($booked_table, $booking->table->table_name);
            }
        }

        return $booked_table;
    }

    public function bookedTables()
    {
        $bookedTables = [
            'single' => $this->getBookedTables('group'),
            'couple' => $this->getBookedTables('couple'),
            'family' => $this->getBookedTables('family'),
            'group' => $this->getBookedTables('group')
        ];
        $cnt = count($bookedTables);
        return $cnt;
    }


}


