<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function __construct() {
        $products = Product::all();
        view()->share('products',$products);
    }

    public function index() {
        return view('front.homepage');
    }

    public function about() {
        return view('front.about');
    }


}
