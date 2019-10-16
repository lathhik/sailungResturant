<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\models\backend\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class AdminController extends Controller
{

    /**
     * Display dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAdmin()
    {
        return view('backend.pages.admin.add-admin');
    }

    /**
     * Store a newly created Admin in databse(table=admins).
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addAdminAction(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3|max:20|alpha',
            'last_name' => 'required|min:3|max:20|alpha',
            'address' => 'required|alpha',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'dob' => 'required|date',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15|min:7',
            'nationality' => 'required|alpha',
            'image' => 'required|image'
        ]);

        $admin = new Admin();
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->address = $request->address;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->gender = $request->gender;
        $admin->date_of_birth = $request->dob;
        $admin->contact = $request->contact;
        $admin->nationality = $request->nationality;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(50) . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/admin'))) {
                mkdir(public_path('custom/backend/images/admin'));
            }

            $image->resize(300, null, function ($a) {
                $a->aspectRatio();
            })->save(public_path('custom/backend/images/admin/' . $newName));
        }
        $admin->image = $newName;

        if ($admin->save()) {
            return redirect()->route('view-admin')->with('success', 'Admin was added successfully');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

    /**
     * Display the all Admins Info.
     *
     * @param \App\models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function ViewAdmin()
    {
        $admins = Admin::all();
        return view('backend.pages.admin.view-admin')->with('admins', $admins);
    }

    /**
     * Show the form for editing the specified Admin.
     *
     * @param \App\models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function editAdmin($id)
    {
        $singleAdmin = Admin::find($id);
        return view('backend.pages.admin.edit-admin')->with('admin', $singleAdmin);
    }

    /**
     * Enables/Disables the status of Admin
     * @param $id
     */
    public function updateStatus($id)
    {
        $singleAdmin = Admin::find($id);

        if ($singleAdmin->status == 0) {
            $singleAdmin->status = 1;
        } elseif ($singleAdmin->status == 1) {
            $singleAdmin->status = 0;
        }

        if ($singleAdmin->update()) {
            return redirect()->back()->with('success', 'Admins status was updated successfully');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

    /**
     * Update the specified Admin in Database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function updateAdminAction(Request $request, $id)
    {
        $singleAdmin = Admin::find($id);

        $this->validate($request, [
            'first_name' => 'required|alpha|min:3|max:20',
            'last_name' => 'required|alpha|min:3|max:20',
            'address' => 'required|alpha|min:3',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15|min:7',
            'gender' => 'required',
            'dob' => 'required',
            'nationality' => 'required|alpha|min:3',
        ]);

        $singleAdmin->first_name = $request->first_name;
        $singleAdmin->last_name = $request->last_name;
        $singleAdmin->address = $request->address;
        $singleAdmin->gender = $request->gender;
        $singleAdmin->contact = $request->contact;
        $singleAdmin->date_of_birth = $request->dob;
        $singleAdmin->nationality = $request->nationality;


        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'image'
            ]);


            $file = $request->file('image');
            $newName = str_random(50) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/admin/' . $singleAdmin->image))) {
                unlink(public_path('custom/backend/images/admin/' . $singleAdmin->image));
            }

            $image->resize(300, null, function ($a) {
                $a->aspectRatio();
            })->save(public_path('custom/backend/images/admin/' . $newName));

            $singleAdmin->image = $newName;

            if ($singleAdmin->save()) {
                return redirect()->route('view-admin')->with('success', 'Admin was successfully updated');
            }
            return redirect()->back()->with('fail', 'There was some problem');
        }
        if ($singleAdmin->save()) {
            return redirect()->route('view-admin')->with('success', 'Admin was successfully updated');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function deleteAdmin($id)
    {
        $singleAdmin = Admin::find($id);

        if (file_exists(public_path('custom/backend/images/admin/' . $singleAdmin->image))) {
            unlink(public_path('custom/backend/images/admin/' . $singleAdmin->image));
        }

        if ($singleAdmin->delete()) {
            return redirect()->back()->with('success', 'Admin was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
