<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\Drink;
use App\models\backend\DrinkType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        return view('backend/pages/drink/view-drink')->with('drinks', $drinks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addDrink()
    {
        $drink_types = DrinkType::all();
        return view('backend/pages/drink/add-drink')->with('drink_types', $drink_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addDrinkAction(Request $request)
    {
        $this->validate($request, [
            'drink_name' => 'required',
            'drink_price' => 'required',
            'drink_type' => 'required',
            'image' => 'required|image'
        ]);

        $drink = new Drink();

        $drink->drink_name = $request->drink_name;
        $drink->drink_price = $request->drink_price;
        $drink->drink_type_id = $request->drink_type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(20) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/drink'))) {
                mkdir(public_path('custom/backend/images/drink'));
            }

            $image->resize(720, 540, function ($ar) {
//                $ar->aspectRatio();
            })->save(public_path('custom/backend/images/drink/' . $newName));

            $drink->image = $newName;

            if ($drink->save()) {
                return redirect()->route('view-drink')->with('success', 'Drink was successfully updated');
            }
            return redirect()->back()->with('fail', 'There was some problem');

        }
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
    public function editDrink($id)
    {
        $drink = Drink::find($id);
        $drink_types = DrinkType::all();
        return view('backend/pages/drink/edit-drink')->with('drink', $drink)->with('drink_types', $drink_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateDrinkAction(Request $request, $id)
    {

        $this->validate($request, [
            'drink_name' => 'required',
            'drink_price' => 'required',
            'drink_type' => 'required',

        ]);

        $drink = Drink::find($id);

        $drink->drink_name = $request->drink_name;
        $drink->drink_price = $request->drink_price;
        $drink->drink_type_id = $request->drink_type;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random('20') . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (file_exists(public_path('custom/backend/images/drink/' . $drink->image))) {
                unlink(public_path('custom/backend/images/drink/' . $drink->image));
            }

            $image->resize(720, 540, function ($ar) {
//                $ar->aspectRatio();
            })->save(public_path('custom/backend/images/drink/' . $newName));

            $drink->image = $newName;

            if ($drink->update()) {
                return redirect()->route('view-drink')->with('success', 'Drink was successfully updated');
            }
            return redirect()->route('view-drink')->with('fail', 'There was some problem');

        }

        if ($drink->update()) {
            return redirect()->route('view-drink')->with('success', 'Drink was successfully updated');
        }
        return redirect()->route('view-drink')->with('fail', 'There was some problem');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteDrink($id)
    {
        $drink = Drink::find($id);

        if (Auth::guard('admin')->user()->privilege != 'Admin') {
            if (file_exists(public_path('custom/backend/images/drink/' . $drink->image))) {
                unlink(public_path('custom/backend/images/drink/' . $drink->image));
            }
            if ($drink->delete()) {
                return redirect()->back()->with('success', 'Drink was successfully deleted');
            }
            return redirect()->back()->with('fail', 'There was some problem');
        }
        return redirect()->back()->with('fail', 'Invalid Access');

    }
}
