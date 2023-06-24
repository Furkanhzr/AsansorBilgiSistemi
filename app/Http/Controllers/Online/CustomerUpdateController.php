<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\City;
use App\Models\Neighbourhood;
use App\Models\Street;
use App\Models\Town;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerUpdateController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('online.user.update',compact('user'));
    }

    public function update(Request $request) {
        $request->validate([
            'phone'=>'unique:users,phone,'. $request->user_id,
            'il' =>'required',
            'ilce' =>'required',
            'mahalle' =>'required',
        ]);
        $city = (City::where('city_key',$request->il)->first())->city_title;
        $town = (Town::where('town_key',$request->ilce)->first())->town_title;
        $neighbourhood =(Neighbourhood::where('neighbourhood_key',$request->mahalle)->first())->neighbourhood_title;
        $street = (Street::where('street_id',$request->sokak)->first())->street_title;
        $user = User::find($request->id);
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->address = $city.'/' .$town.' '.$neighbourhood.' '.$street.' Bina Numarası: '.$request->building;
        $user->email = $request->email;
        $user->date_of_birth = $request->date_of_birth;
        $user->password = Hash::make('123456');
        $building = new Building();
        $building->building_title = $request->building;
        if(is_null($request->sokak)){
            $building->neighbourhood_key = $request->mahalle;
        }
        else{
            $building->street_key = $request->sokak;
        }
        $building->save();
        $user->save();
        return redirect()->route('customer.dashboard');
    }
}
