<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\FoodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodTypeController extends Controller
{

    /** Shows the food_type list
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewFoodType(Request $request)
    {
        $food_types = FoodType::all();

        return view('backend/pages/food/view-food-type')->with('food_types', $food_types);
    }


    /**
     *  Shows the form to add food
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addFoodType()
    {
        return view('backend/pages/food/add-food-type');
    }

    /**
     * Validate and Add food_type
     * @param Request $request
     */
    public function addFoodTypeAction(Request $request)
    {

        $this->validate($request, [
            'food_type' => 'required'
        ]);

        $food_type = new FoodType();

        $food_type->food_type = $request->food_type;

        if ($food_type->save()) {
            return redirect()->route('view-food-type')->with('success', 'Food Type was successfully added');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }


    /**
     * Shows the form to edit food_type
     * @param $id
     */
    public function editFoodType($id)
    {
        $food_type = FoodType::find($id);
        return view('backend/pages/food/edit-food-type')->with('food_type', $food_type);
    }

    /** update food type
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateFoodTypeAction(Request $request, $id)
    {
        $this->validate($request, [
            'food_type' => 'required'
        ]);

        $food_type = FoodType::find($id);

        $food_type->food_type = $request->food_type;

        if ($food_type->save()) {
            return redirect()->route('view-food-type')->with('success', 'Food Type was successfully updated');
        }
        return redirect()->route('view-food-type')->with('fail', 'There was some problem');
    }

    /** deletes food type
     * @param $id
     */
    public function deleteFoodType($id)
    {
        $food_type = FoodType::find($id);

        if ($food_type->delete()) {
            return redirect()->back()->with('success', 'Food Type was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

}




