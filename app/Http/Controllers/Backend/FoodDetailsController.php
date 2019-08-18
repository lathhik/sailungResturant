<?php

namespace App\Http\Controllers\Backend;

use App\models\Food;
use App\models\FoodDetails;
use App\models\FoodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFoodDetails()
    {
        $foods = Food::all();
        $food_types = FoodType::all();
        return view('backend/pages/food/add-food-det')->with('foods', $foods)->with('food_types', $food_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addFoodDetailsAction(Request $request)
    {
        $this->validate($request, [
            'food' => 'required',
            'food_type' => 'required'
        ]);

        foreach ($request->food_type as $food_type_id):
            $food_det = new FoodDetails();
            $food_det->food_id = $request->food;
            $food_det->food_type_id = $food_type_id;
            $food_det->save();
        endforeach;

        return redirect()->back()->with('success', 'Food Details was successfully added');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
