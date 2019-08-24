<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\models\backend\Table;
use App\models\backend\TableTypes;
use Illuminate\Http\Request;

class TableController extends Controller
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
    public function addTable()
    {
        $table_types = TableTypes::all();
        return view('backend/pages/table/add-table')->with('table_types', $table_types);
    }

    /**
     * Store a newly created table in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addTableAction(Request $request)
    {
        $this->validate($request, [
            'table_name' => 'required',
            'booking_price' => 'required|numeric',
            'table_type' => 'required'
        ]);

        $tables = new Table();
        $tables->table_name = $request->table_name;
        $tables->booking_price = $request->booking_price;
        $tables->table_types_id = $request->table_type;

        if ($tables->save()) {
            return redirect()->route('view-table')->with('success', 'Table was successfully added');
        }
        return redirect()->back()->with('fail', 'There was some problem');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function viewTable(Table $table)
    {
        $tables = Table::all();
        $table_types = TableTypes::all();
        return view('backend/pages/table/view-tables')->with('tables', $tables)->with('table_types', $table_types);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function editTable(Table $table, $id)
    {
        $table = Table::find($id);
        $table_types = TableTypes::all();
        return view('backend/pages/table/edit-table')->with('table', $table)->with('table_types', $table_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function updateTableAction(Request $request, Table $table, $id)
    {
        $this->validate($request, [
            'table_name' => 'required',
            'booking_price' => 'required|numeric',
            'table_type' => 'required'
        ]);
        $table = Table::find($id);

        $table->table_name = $request->table_name;
        $table->booking_price = $request->booking_price;
        $table->table_types_id = $request->table_type;

        if ($table->update()) {
            return redirect()->route('view-table')->with('success', 'Table was updated successfully');
        }
        return redirect()->route('view-table')->with('fail', 'There was problem');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\models\Table $table
     * @return \Illuminate\Http\Response
     */
    public function deleteTableAction(Table $table, $id)
    {
        $table = Table::find($id);

        if ($table->delete()) {
            return redirect()->back()->with('success', 'Table was deleted successfully');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
