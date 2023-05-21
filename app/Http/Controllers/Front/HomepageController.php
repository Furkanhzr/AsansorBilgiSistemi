<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        return view('front.homepage');
    }

    public function about() {
        return view('front.about');
    }


}
