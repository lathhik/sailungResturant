<?php

namespace App\Http\Controllers\backend;

use App\models\backend\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        return view('backend/admin-login');
    }

    public function loginAction(Request $request)
    {
        $admin = [];
        $admin['email'] = $request->email;
        $admin['password'] = $request->password;

//        $admin = new Admin();
//        $admin->email = $request->email;
//        $admin->password = $request->password;

        $remember = false;

        if ($request->input('remember')) {
            $remember = true;
        }

        if (Auth::guard('admin')->attempt($admin, $remember)) {
            $adm = Admin::where('email', $admin['email'])->get();
            if ($adm[0]->status == 1) {
                return redirect()->intended(route('dashboard'));
            }
            return redirect()->back()->with('fail', 'Blocked');
        }
        return redirect()->back()->with('fail', 'Invalid Credentials');
    }

    /** log out logged in admin to admin login page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logOut()
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect()->route('admin-login');
    }
}
