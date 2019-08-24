<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\models\backend\Employee;
use App\models\backend\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Image;
use function PHPSTORM_META\type;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(5);
        return view('backend/pages/employee/view-emp')->with('employees', $employees);
    }

    /**
     * Show the form for creating new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEmp()
    {
        $roles = Role::all();
        return view('backend.pages.employee.add-emp')->with('roles', $roles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addEmpAction(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3|max:20|alpha',
            'last_name' => 'required|min:3|max:20|alpha',
            'address' => 'required|min:3|alpha',
            'gender' => 'required',
            'dob' => 'required|date',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15|min:7',
            'email' => 'required|email|unique:employees,email',
            'job_started_from' => 'required|date',
            'role' => 'required|numeric',
            'salary' => 'required|numeric',
            'nationality' => 'required|alpha',
            'image' => 'required|image'
        ]);

        $emp = new Employee();
        $emp->first_name = $request->first_name;
        $emp->last_name = $request->last_name;
        $emp->address = $request->address;
        $emp->gender = $request->gender;
        $emp->date_of_birth = $request->dob;
        $emp->contact = $request->contact;
        $emp->email = $request->email;
        $emp->job_started_from = $request->job_started_from;
        $emp->role_id = $request->role;
        $emp->salary = $request->salary;
        $emp->nationality = $request->nationality;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = str_random(50) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (!file_exists(public_path('custom/backend/images/employee'))) {
                mkdir(public_path('custom/backend/images/employee'));
            }

            $image->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->save(public_path('custom/backend/images/employee/' . $newName));
        }

        $emp->image = $newName;

        if ($emp->save()) {
            return redirect()->route('view-emp')->with('success', 'Employee was successfully added');
        }
        return redirect()->back()->with('fail', 'There was some problem');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function editEmp(Employee $employee, $id)
    {
        $roles = Role::all();
        $emp = Employee::find($id);
        return view('backend.pages.employee.edit-emp')->with('emp', $emp)->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function updateEmpAction(Request $request, Employee $employee, $id)
    {
        $emp = Employee::find($id);
//        return $emp->email;

        $this->validate($request, [
            'first_name' => 'required|min:3|max:20|alpha',
            'last_name' => 'required|min:3|max:20|alpha',
            'address' => 'required|min:3',
            'gender' => 'required',
            'dob' => 'required|date',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:15|min:7',
            'nationality' => 'required|min:3|alpha',
            'job_started_from' => 'required|date',
            'salary' => 'required|numeric',
            'role' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('employees')->ignore($emp->id)
            ]
        ]);

        $emp->first_name = $request->first_name;
        $emp->last_name = $request->last_name;
        $emp->address = $request->address;
        $emp->gender = $request->gender;
        $emp->date_of_birth = $request->dob;
        $emp->contact = $request->contact;
        $emp->nationality = $request->nationality;
        $emp->job_started_from = $request->job_started_from;
        $emp->role_id = $request->role;
        $emp->salary = $request->salary;
        $emp->email = $request->email;

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image'
            ]);

            $file = $request->file('image');
            $newName = str_random(20) . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            if (file_exists(public_path('custom/backend/images/employee/' . $emp->image))) {
                unlink(public_path('custom/backend/images/employee/' . $emp->image));
            }

            $image->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->save(public_path('custom/backend/images/employee/' . $newName));

            $emp->image = $newName;

            if ($emp->save()) {
                return redirect()->route('view-emp')->with('success', 'Employee was successfully updated');
            }
            return redirect()->route('view-emp')->with('fail', 'There was some problem');
        }

        if ($emp->save()) {
            return redirect()->route('view-emp')->with('success', 'Employee was successfully updated');
        }
        return redirect()->route('view-emp')->with('fail', 'There was some problem');
    }

    /**
     * Update status of an Employee
     */

    public function updateEmpStatus($id)
    {
        $emp = Employee::find($id);

        if ($emp->status == 1) {
            $emp->status = 0;
        } elseif ($emp->status == 0) {
            $emp->status = 1;
        }

        if ($emp->update()) {
            return redirect()->back()->with('success', 'Employee status was successfully updated');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\models\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function deleteEmp(Employee $employee, $id)
    {
        $emp = Employee::find($id);

        if (file_exists(public_path('custom/backend/images/employee/' . $emp->image))) {
            unlink(public_path('custom/backend/images/employee/' . $emp->image));
        }

        if ($emp->delete()) {
            return redirect()->back()->with('success', 'Employee was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }


    public function searchAction(Request $request)
    {
        $searchFor = $request->search;

        if (empty($searchFor)) {
            return redirect()->back()->with('fail', 'No search were given');
        } else {
            $result = Employee::whereHas('role', function ($query) use ($searchFor) {
                $query->where('role', 'LIKE', '%' . $searchFor . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $searchFor . '%')
                    ->orWhere('email', 'LIKE', '%' . $searchFor . '%')
                    ->orWhere('role_id', 'LIKE', '%' . $searchFor . '%');
            })->paginate(5);

            if (count($result) > 0) {
                return view('backend/pages/employee/view-emp')
                    ->with('employees', $result)
                    ->with('success', 'Search Results');
//                return redirect()->route('view-emp')->with('success', ' Search Results')->with('employees', $result);
//                return redirect()->route('view-emp')->with('employees', $result);
            }
        }
        return redirect()->route('view-emp')->with('fail', 'No such search was found');
    }
}
