<?php

namespace App\Http\Controllers\Backend;

use App\models\backend\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.pages.employee.view-emp-role')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Employee Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEmpRole()
    {
        return view('backend.pages.employee.add-emp-role');
    }

    /**
     * Store a newly created Employee Role in DB.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addEmpRoleAction(Request $request)
    {
        $this->validate($request, [
            'role' => 'required|alpha|min:3|max:15'
        ]);


        $role = new Role();
        $role->role = $request->role;

        if ($role->save()) {
            return redirect()->route('view-emp-role')->with('success', 'Employee Role was successfully added');
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
    public function editRole($id)
    {
        $singleRole = Role::find($id);

        return view('backend.pages.employee.edit-emp-role')->with('singleRole', $singleRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateEmpRoleAction(Request $request, $id)
    {
        $singleRole = Role::find($id);

        $this->validate($request, [
            'role' => 'required|alpha|min:3|max:15'
        ]);

        $singleRole->role = $request->role;

        if ($singleRole->save()) {
            return redirect()->route('view-emp-role')->with('success', 'Employee\'s role was successfully updated');

        }
        return redirect()->route('view-emp-role')->with('fail', 'There was some problem');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRole($id)
    {
        $singleRole = Role::find($id);

        if ($singleRole->delete()) {
            return redirect()->back()->with('success', 'Employee\'s Role was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
