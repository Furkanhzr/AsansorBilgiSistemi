<?php

namespace App\Http\Controllers;

use App\Models\HasRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            toastr()->success('Tekrardan Hoşgeldiniz. '.Auth::user()->name,'Başarılı');
            if(Auth::id()) {
                if (is_null(HasRoles::where('model_id',Auth::id())->first())){
                    return redirect()->route('customer.dashboard');
                }
                else{
                    return redirect()->route('dashboard');
                }
            }
        }

        else {
            toastr()->error('Email veya şifreniz hatalı.','Başarısız');
            return redirect()->route('login')->withErrors("Email adresi veya şifre hatalı")->withInput();
        }
    }

    public function logOut() {
        Auth::logout();
        toastr()->success('Çıkış Yapıldı.','Başarılı');
        return redirect()->route('login');
    }

//    public function registerIndex() {
//        return view('auth.register');
//    }
//    public function registerPost() {
//
//    }

}
