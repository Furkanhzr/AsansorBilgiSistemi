<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
//            toastr()->success('Tekrardan Hoşgeldiniz. '.Auth::user()->name,'Başarılı');
            return redirect()->route('dashboard');
        }

        else {
            return redirect()->route('login')->withErrors("Email adresi veya şifre hatalı")->withInput();
        }
    }

    public function logOut() {
        Auth::logout();
        return redirect()->route('login');
    }

//    public function registerIndex() {
//        return view('auth.register');
//    }
//    public function registerPost() {
//
//    }

}
