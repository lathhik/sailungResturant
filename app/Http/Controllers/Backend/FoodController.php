<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\models\Food;
use App\models\FoodType;
use Illuminate\Http\Request;
use Image;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view('backend/pages/food/view-food')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFood()
    {
        $food_types = FoodType::all();
        return view('backend/pages/food/add-food')->with('food_types', $food_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addFoodAction(Request $request)
    {
        $this->validate($request, [
//            'food_name' => 'required|regex:/^[a-z]*\s(.*)/',
            'food_name' => 'required',
            'food_price' => 'required|numeric',
            'image' => 'required|image'
        ]);

        $food = new Food();

        $food->food_name = $request->food_name;
        $food->food_price = $request->food_price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(20) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/food'))) {
                mkdir(public_path('custom/backend/images/food'));
            }

            $image->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->save(public_path('custom/backend/images/food/' . $newName));
        }

        $food->image = $newName;

        if ($food->save()) {
            return redirect()->route('view-food')->with('success', 'Food was added successfully');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function editFood(Food $food, $id)
    {
        $food = Food::find($id);
        return view('backend/pages/food/edit-food')->with('food', $food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function updateFoodAction(Request $request, $id)
    {
        $food = Food::find($id);

        $this->validate($request, [
            'food_name' => 'required|regex:/^[a-z]*\s(.*)/',
            'food_price' => 'required|numeric',
//           'image'=>'required|image'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(20) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (file_exists(public_path('custom/backend/images/food/' . $food->image))) {
                unlink(public_path('custom/backend/images/food/' . $food->image));
            }

            $image->resize(600, null, function ($ar) {
                $ar->aspectRatio();
            })->save(public_path('custom/backend/images/food/' . $newName));

            $food->image = $newName;

            if ($food->save()) {
                return redirect()->route('view-food')->with('success', 'Food was updated successfully');
            }
            return redirect()->route('view-food')->with('fail', 'There was some problem');
        }

        if ($food->save()) {
            return redirect()->route('view-food')->with('success', 'Food was updated successfully');
        }
        return redirect()->route('view-food')->with('fail', 'There was some problem');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\models\Food $food
     * @return \Illuminate\Http\Response
     */
    public function deleteFood(Food $food, $id)
    {
        $food = Food::find($id);

        if (file_exists(public_path('custom/backend/images/food/' . $food->image))) {
            unlink(public_path('custom/backend/images/food/' . $food->image));
        }

        if ($food->delete()) {
            return redirect()->back()->with('success', 'Food was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
