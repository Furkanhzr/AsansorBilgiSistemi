<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Fault;
use App\Models\Repair;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $array = [];
        $elevators = Elevator::where('user_id','=',$user->id)->get();
        foreach ($elevators as $elevator) {
            array_push($array,$elevator->id);
        }
        $faults = Fault::where('solved_time','=',null)->where('elevator_id','=',$array)->orderBy('down_time','DESC')->paginate(3, ['*'], 'fault');
        $repairsArray = [];
        $repairs = Repair::where('elevator_id','=',$array)->where('status','=',0)->get();
        foreach ($repairs as $repair) {
            $to = Carbon::parse($repair->repair_time);
            $from = Carbon::parse(Carbon::now('Europe/Istanbul')->toDateTimeString());
            $diff =$to->diffInDays($from);
            $tempObj = [
              'key_code' => $repair->getElevator->key_code,
              'diff' => $diff,
            ];
            array_push($repairsArray,$tempObj);
        }
        return view('online.dashboard', compact('user','faults','repairsArray'));
    }

    public function getFaultData(Request $request) {
        if($request->ajax())
        {
            $user = Auth::user();
            $array = [];
            $elevators = Elevator::where('user_id','=',$user->id)->get();
            foreach ($elevators as $elevator) {
                array_push($array,$elevator->id);
            }
            $faults = Fault::where('solved_time','=',null)->where('elevator_id','=',$array)->orderBy('down_time','DESC')->paginate(3, ['*'], 'fault');
            return view('admin.tables.fault_table', compact('faults'))->render();
        }
    }
}
