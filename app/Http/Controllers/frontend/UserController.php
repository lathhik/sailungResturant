<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
     *  get the use ids from special signup form and sotres it to userEmail.txt
     */
    public function storeUserEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('special-signup-error')->withErrors($validator)->withInput();
        } else {
            $data = $request->email;
            $signedUpEmails = fopen(storage_path('userEmail/user_email.txt'), 'r');

            $arr_ids = [];
            while (!feof($signedUpEmails)) {
                $all_ids = fgets($signedUpEmails);
                array_push($arr_ids, $all_ids);
            }
            fclose($signedUpEmails);

            foreach ($arr_ids as $ids) {
                if (rtrim($ids) == $data) {
                    return redirect()->route('special-signup-error')->with('fail', 'Email already taken');
                }
            }
            $file = fopen(storage_path('userEmail/user_email.txt'), 'a+');
            if (fwrite($file, $data . "\n")) {
                fclose($file);
                return redirect()->route('special-signup-error')->with('success', 'Thank You');
            }
        }
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
    public function store(Request $request)
    {
        //
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
