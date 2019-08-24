<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\models\backend\TableTypes;
use Illuminate\Http\Request;

class TableTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table_types = TableTypes::all();
        return view('backend/pages/table/view-table-type')->with('table_types', $table_types);
    }

    /**
     * Show the form for creating a new table types.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTableType()
    {
        return view('backend/pages/table/add-table-type');
    }

    /**
     * Store a newly created table types in database.
     * redirect to view
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addTableTypesAction(Request $request)
    {
        $this->validate($request, [
            'table_type' => 'required|min:3'
        ]);

        $table_type = new TableTypes();
        $table_type->table_types = $request->table_type;
        if ($table_type->save()) {
            return redirect()->route('view-table-type')->with('success', 'Table Type was successfully added ');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\models\TableTypes $tableTypes
     * @return \Illuminate\Http\Response
     */
    public function show(TableTypes $tableTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified table type.
     *
     * @param \App\models\TableTypes $tableTypes
     * @return \Illuminate\Http\Response
     */
    public function editTableType(TableTypes $tableTypes, $id)
    {
        $table_type = TableTypes::find($id);
        return view('backend/pages/table/edit-table-type')->with('table_type', $table_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\models\TableTypes $tableTypes
     * @return \Illuminate\Http\Response
     */
    public function updateTableTypeAction(Request $request, TableTypes $tableTypes, $id)
    {
        $this->validate($request, [
            'table_type' => 'required'
        ]);

        $table_type = TableTypes::find($id);
        $table_type->table_types = $request->table_type;

        if ($table_type->update()) {
            return redirect()->route('view-table-type')->with('success', 'Table updated was successfully updated');
        }
        return redirect()->route('view-table-type')->with('fail', 'There was some problem');
    }

    /**
     * Remove the specified table type from storage.
     *
     * @param \App\models\TableTypes $tableTypes
     * @return \Illuminate\Http\Response
     */
    public function deleteTableType(TableTypes $tableTypes, $id)
    {
        $table_type = TableTypes::find($id);

        if ($table_type->delete()) {
            return redirect()->route('view-table-type')->with('success', 'Table Type was successfully deleted');
        }
        return redirect()->route('view-table-type')->with('fail', 'There was some problem');
    }
}
