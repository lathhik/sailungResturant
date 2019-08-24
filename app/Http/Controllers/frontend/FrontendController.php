<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * show the gallery page
     */
    public function showGallery()
    {
        return view('frontend/pages/gallery');
    }


    /**
     * shows the about page
     */
    public function showAbout()
    {
        return view('frontend/pages/about');
    }

    public function showContact()
    {
        return view('frontend/pages/contact');
    }
}
