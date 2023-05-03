<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function loginPost(Request $request) {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
//            toastr()->success('Tekrardan Hoşgeldiniz. '.Auth::user()->name,'Başarılı');
            return redirect()->route('admin.dashboard');
        }

        else {
            return redirect()->route('admin.login')->withErrors("Email adresi veya şifre hatalı")->withInput();
        }
    }

}
