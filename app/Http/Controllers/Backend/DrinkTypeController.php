<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\DrinkType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrinkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drink_types = DrinkType::all();
        return view('backend/pages/drink/view-drink-type')->with('drink_types', $drink_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDrinkType()
    {
        return view('backend/pages/drink/add-drink-type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addDrinkTypeAction(Request $request)
    {
        $this->validate($request, [
            'drink_type' => 'required'
        ]);

        $drink_type = new DrinkType();

        $drink_type->drinks_types = $request->drink_type;

        if ($drink_type->save()) {
            return redirect()->route('view-drink-type')->with('success', 'Drink was successfully added');
        }
        return redirect()->back()->with('fail', 'There was some problem');
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
    public function editDrinkType($id)
    {
        $drink_type = DrinkType::find($id);

        return view('backend/pages/drink/edit-drink-type')->with('drink_type', $drink_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateDrinkTypeAction(Request $request, $id)
    {
        $this->validate($request, [
            'drink_type' => 'required'
        ]);

        $drink_type = DrinkType::find($id);

        $drink_type->drinks_types = $request->drink_type;

        if ($drink_type->update()) {
            return redirect()->route('view-drink-type')->with('success', 'Drink Type was successfully updated');
        }
        return redirect()->route('view-drink-type')->with('fail', 'There was some problem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDrinkType($id)
    {
        $drink_type = DrinkType::find($id);

        if ($drink_type->delete()) {
            return redirect()->back()->with('success', 'Drinks was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
