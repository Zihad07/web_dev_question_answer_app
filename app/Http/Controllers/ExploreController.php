<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function about() {
        return view('myview.about');
    }
}
