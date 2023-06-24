<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Fault;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaultRequestController extends Controller
{
    public function index() {
        $user = Auth::user();
        $elevators = Elevator::where('user_id','=',$user->id)->get();
        return view('online.faultRequest.index',compact('elevators'));
    }

    public function create(Request $request){
        $request->validate([
            'elevator' => 'required',
            'description' => 'required',
        ]);

        $fault = new Fault();
        $fault->user_id = Auth::id();
        $fault->elevator_id = $request->elevator;
        $fault->description = $request->description;
        $fault->down_time =  Carbon::now('Europe/Istanbul')->toDateTimeString();;
        $fault->save();

        toastr()->success('Arıza Talebi Başarıyla Oluşturuldu', 'Başarılı');
        return redirect()->route('customer.faults.index');
    }
}
