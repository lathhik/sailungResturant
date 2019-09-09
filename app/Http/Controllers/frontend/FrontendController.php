<?php

namespace App\Http\Controllers\frontend;

use App\models\backend\Drink;
use App\models\backend\Employee;
use App\models\backend\Food;
use App\models\backend\Role;
use App\models\backend\Table;
use App\models\backend\TableTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * show the gallery page
     */
    public function showGallery()
    {
        return view('frontend/pages/gallery');
    }


    /**
     * shows the about page
     */
    public function showAbout()
    {
        return view('frontend/pages/about');
    }

    public function showContact()
    {
        return view('frontend/pages/contact');
    }


    public function showChefs()
    {

        $chefs = Employee::whereHas('role', function ($query) {
            $query->where('role', 'chef');
        })->get();
        return $chefs;
    }


    public function showEventDetails()
    {
        return view('frontend/details/event-details');
    }


    # =============================== #### ========================


    public function test()
    {
//        $breakfast = Food::with('foodFoodType', function ($qry) {
//            $qry->whereHas('food', function ($qry) {
//                $qry->where('food_type', 'breakfast');
//            });
//        });

//        $drinks = Drink::all();
////        return $drinks;
//        foreach ($drinks as $drink){
//            return $drink->drinkType->drinks_types;
//        }


        $lunchs = [$this->getFoodType('lunch')];
        echo '<pre>';
        print_r($lunchs);
        echo '</pre>';

        $foodTypes = ['breakfast' => $this->getFoodType('breakfast'),
            'sitan' => $this->getFoodType('sitan'), 'dinner' => $this->getFoodType('dinner')];
//        return view('test')->with('foodTypes', $foodTypes);
    }


    public function getDrinkType()
    {
        $type = [];
        $drinks = Drink::all();
        return $drinks;
    }

    public function test2()
    {
        $lunchs = $this->getFoodType('lunch');
        array_pop($lunchs);
        $count = count($lunchs);
        if ($count % 2 == 0) {

        } else {

        }
        return view('test')->with('lunchs', $lunchs)->with('count', $count);
    }

    public function getFoodType($type)
    {
        $breakfasts = [];
        $foods = Food::with('foodFoodType')->get();
//        $foods = Food::all();
//        return $foods;

        foreach ($foods as $food) {
            foreach ($food->foodFoodType as $pivot) {
                if ($pivot->foodType->food_type == $type) {
                    array_push($breakfasts, $food);
                }
            }
        }
        return $breakfasts;
    }

    public function test3()
    {
        $tableTypes = TableTypes::all();
        foreach ($tableTypes as $tableType) {
            foreach ($tableType->tables as $table) {
                echo $table->table_name;
            }
        }

    }
}
