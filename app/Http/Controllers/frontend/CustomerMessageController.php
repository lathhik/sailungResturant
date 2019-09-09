<?php

namespace App\Http\Controllers\frontend;

use App\models\frontend\CustomerMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerMessageController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addCustomerMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required|min:50'
        ]);

        $customer_message = New CustomerMessage();
        $customer_message->c_name = $request->name;
        $customer_message->c_email = $request->email;
        $customer_message->c_phone = $request->phone;
        $customer_message->c_message = $request->message;

        if ($customer_message->save()) {
            return redirect()->route('contact-done')->with('success', 'Thank You for your feedback');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function viewFeedback(Request $request)
    {
        $customers = CustomerMessage::all();
        return view('backend/pages/customer/view-feedback')->with('customers', $customers);
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
    public function deleteCustomer($id)
    {
        $customer = CustomerMessage::find($id);

        if ($customer->delete()) {
            return redirect()->back()->with('success', 'Customer was successfully deleted');
        }
        return redirect()->back()->with('fail', 'There was some problem');
    }
}
