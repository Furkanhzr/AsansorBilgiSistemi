<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Fault;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class CustomerFaultController extends Controller
{
    public function index() {
        return view('online.fault.index');
    }

    public function fetch() {
        $elevators  = Elevator::where('user_id','=',Auth::id())->get();
        $array = [];
        foreach ($elevators as $elevator){
            array_push($array,$elevator->id);
        }
        $fault = DB::table('faults')
            ->whereIn('elevator_id', $array)
            ->get();
        return DataTables::of($fault)
            ->editColumn('description', function ($fault) {
                return strip_tags(Str::limit($fault->description,50));
            })
            ->editColumn('status', function ($fault) {
                if($fault->status == 0){
                    return $fault->status = 'Arıza Devam Ediyor';
                }
                return  $fault->status = 'Arıza Onarıldı';
            })
            ->editColumn('transaction_id', function ($fault) {
                if($fault->transaction_id == null){
                    return $fault->transaction_id = 'Henüz Fatura Oluşturulmadı';
                }
                return  $fault->transaction_id ;
            })
            ->editColumn('solved_time', function ($fault) {
                if($fault->solved_time == null){
                    return $fault->solved_time = 'Arzıa Çözülmedi';
                }
                return  $fault->solved_time ;
            })
            ->addColumn('show', function ($fault) {
                return '<a class="btn btn-primary" onclick="detailModal(' . $fault->id . ')"><i class="fas fa-eye"></i> &nbspDetay</a>';
            })
            ->rawColumns(['description','status','solved_time','transaction_id', 'show'])
            ->make();
    }

    public function detail(Request $request){
        $fault = Fault::where('id',$request->id)->first();
        $elevator = Elevator::where('id',$fault->elevator_id)->first();
        $user = User::where('id',$elevator->user_id)->first();
        $data =[
            ['fault_description' => $fault->description],
            ['user' => $user]
        ];
        return response()->json($data);
    }

}
