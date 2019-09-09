<?php

namespace App\Providers;

use App\models\backend\Drink;
use App\models\backend\Employee;
use App\models\backend\Food;
use App\models\backend\FoodType;
use App\models\backend\TableTypes;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\models\backend\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # ================ get logged admin info in all view =================
        View::composer('backend.*', function ($view) {
            $view->with('loggedAdmin', Auth::guard('admin')->user());
        });


        # ======================= get all table types in view ===================
        $table_types = TableTypes::all();
        View::share('table_types', $table_types);


        # ================== get food types ===================
        $foodTypes = ['breakfast' => $this->getFoodType('breakfast'),
            'sitan' => $this->getFoodType('sitan'),
            'lunch' => $this->getFoodType('lunch'),
            'meal' => $this->getFoodType('meal'),
            'dinner' => $this->getFoodType('dinner'),
            'desert' => $this->getFoodType('desert')];
        View::share('foodTypes', $foodTypes);


        #======= get lunch (total count even) =================
        $lunchs = $this->getFoodType('lunch');
        $count = count($lunchs);
        if ($count % 2 == 0) {
            View::share('lunchs', $lunchs);
        } else {
            array_pop($lunchs);
            View::share('lunchs', $lunchs);
        }


        # ========= get drinks (total even count)
        $drinkss = Drink::all();
        $drinkss_array = array($drinkss);

        foreach ($drinkss_array as $drinks) {
            $count_drink = count($drinks);
            if ($count_drink % 2 == 0) {
                View::share('drinkss', $drinks);
            } else {
                unset($drinks[1]);
                View::share('drinkss', $drinks);
            }
        }

        $drink_count = count($drinkss);
        if ($drink_count % 2 == 0) {
            View::share('drinkss', $drinkss);
        } else {
            array_pop($drinkss);
            View::share('drinkss', $drinkss);
        }


        # fetch only chefs
        $chefs = Employee::whereHas('role', function ($query) {
            $query->where('role', 'chef');
        })->get();

        View::share('chefs', $chefs);


        # ================ get dinners ====================
        $dinners = $this->getFoodType('dinner');
        $count = count($dinners);
        if ($count % 2 == 0) {
            View::share('dinners', $dinners);
        } else {
            array_pop($dinners);
            View::share('dinners', $dinners);
        }

        #  ============ get drinks =========================
        $drinks = Drink::all();
        View::share('drinks', $drinks);

        # ======= share events ================
        $events = Event::all();
        View::share('events', $events);
    }

    public function getFoodType($type)
    {
        $types = [];
        $foods = Food::with('foodFoodType')->get();
        foreach ($foods as $food) {
            foreach ($food->foodFoodType as $pivot) {
                if ($pivot->foodType->food_type == $type) {
                    array_push($types, $food);
                }
            }
        }
        return $types;
    }
}
