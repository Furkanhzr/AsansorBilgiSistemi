<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Elevator;
use App\Models\Fault;
use App\Models\Repair;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $elevatorsCount = Elevator::count();
        $usersCount = User::where('id','!=',1)->count();
        $faultsCount = Fault::where('solved_time','=',null)->count();
        $repairsCount = Repair::where('status','=',0)->count();
        $contacts = Contact::orderBy('created_at','DESC')->select('name','surname','phone')->take(3)->get();

        $today = Carbon::today();
        $faults = Fault::where('solved_time','=',null)->orderBy('down_time','DESC')->paginate(3, ['*'], 'fault');
        $repairs = Repair::where('repair_time','>=',$today)->where('status','=',0)->orderBy('repair_time','DESC')->paginate(3, ['*'], 'repair');
        return view('admin.dashboard', compact('user','elevatorsCount','usersCount','faultsCount','repairsCount','contacts','faults','repairs'));
    }

    public function monthlyProductFetch() {
        $monthlyArr = [];
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create(date('Y'), $month);
            $date_end = $date->copy()->endOfMonth();

            $elevatorCount = Transaction::where('transaction_type','=',0)->where('status','=',1)->where('payment_time', '>=', $date)->where('payment_time', '<=', $date_end)->count();
            array_push($monthlyArr, $elevatorCount);
        }
        return response()->json($monthlyArr);
    }

    public function getFaultData(Request $request) {
        if($request->ajax())
        {
            $faults = Fault::where('solved_time','=',null)->orderBy('down_time','DESC')->paginate(3, ['*'], 'fault');
            return view('admin.tables.fault_table', compact('faults'))->render();
        }
    }

    public function getRepairData(Request $request) {
        if($request->ajax())
        {
            $today = Carbon::today();
            $repairs = Repair::where('repair_time','>=',$today)->where('status','=',0)->orderBy('repair_time','DESC')->paginate(3, ['*'], 'repair');
            return view('admin.tables.fault_table', compact('repairs'))->render();
        }
    }
}
