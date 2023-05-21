<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ContactController extends Controller
{
    public function __construct() {
        $products = Product::all();
        view()->share('products',$products);
    }

    public function index() {
        return view('front.contact');
    }

    public function list() {
    }

    public function fetch() {

    }

    public function create() {

    }

    public function update() {

    }

    public function delete() {

    }
}
