<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * shows blog page
     */
    public function index()
    {
        return view('frontend/pages/blog');
    }
}
