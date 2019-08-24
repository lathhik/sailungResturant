<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     *  shows the menu page
     */
    public function index()
    {
        return view('frontend/pages/menu');
    }
}
