<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\City;
use App\Models\Elevator;
use App\Models\Neighbourhood;
use App\Models\Street;
use App\Models\Town;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        return view('admin.user.index');
    }

    public function fetch(){
        $user = User::all();
        return DataTables::of($user)
            ->editColumn('name', function ($user) {
                return $user->name.' '.$user->surname;
            })
            ->editColumn('subscription', function ($user) {
                if($user->subscription == 0){
                    return $user->subscription = 'Abone Değil';
                }
                return  $user->subscription = 'Abone';
            })
            ->addColumn('show', function ($user) {
                return '<a href="'. route('products.single',$user->id) .'" class="btn btn-info" ><i class="fas fa-eye"></i> &nbspGöster</a>';
            })
            ->addColumn('update', function ($user) {
                return '<a href="'. route('products.update.index',$user->id) .'" class="btn btn-warning" ><i class="fas fa-edit"></i> Güncelle</a>';
            })
            ->addColumn('delete', function ($user) {
                return '<a class="btn btn-danger" onclick="productsDelete(' . $user->id . ')"><i class="fas fa-trash"></i> Sil</a>';
            })
            ->rawColumns(['name','subscription','show','update', 'delete'])
            ->make();
    }


    public function createIndex(Request $request){
        return view('admin.user.create');
    }

    public function getCity(){
        $data = City::orderBy('city_key','ASC')->get();
        return response()->json($data);
    }
    public function getTown(Request $request){
        $data = City::where('city_key',$request->city)->first();
        $data = Town::where('town_city_key',$data->city_key)->get();
        return response()->json($data);
    }
    public function getNeighbourhood(Request $request){
        $data = Town::where('town_key',$request->town)->first();
        $data = Neighbourhood::where('neighbourhood_town_key',$data->town_key)->get();
        return response()->json($data);
    }
    public function getStreet(Request $request){
        $data = Neighbourhood::where('neighbourhood_key',$request->street)->first();
        $data = Street::where('street_neighbourhood_key',$data->neighbourhood_key)->get();
        return response()->json($data);
    }

    public function createPost(Request $request){
        $request->validate([
            'phone'=>'unique:users,phone',
            'il' =>'required',
            'ilce' =>'required',
            'mahalle' =>'required',
        ]);
        $city = (City::where('city_key',$request->il)->first())->city_title;
        $town = (Town::where('town_key',$request->ilce)->first())->town_title;
        $neighbourhood =(Neighbourhood::where('neighbourhood_key',$request->mahalle)->first())->neighbourhood_title;
        $street = (Street::where('street_id',$request->sokak)->first())->street_title;
        $user = new User();
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
        return redirect()->route('user.index');
    }

}
