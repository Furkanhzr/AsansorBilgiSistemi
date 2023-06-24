<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Image;
use App\Models\Fault;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use mysql_xdevapi\CollectionAdd;
use Yajra\DataTables\DataTables;

class FaultController extends Controller
{
    public function __construct() {
        $faults = Fault::all();
        view()->share('fault',$faults);
    }

    public function index() {
        return view('admin.fault.index');
    }

    public function fetch() {
        $fault = Fault::all();
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
            ->addColumn('transaction', function ($fault) {
                if (isset($fault->transaction_id)) {
                    return '<button class="btn btn-success" disabled><i class="fas fa-money-bill"></i> &nbspFaturalandırlı</button>';
                }
                else {
                    return '<a class="btn btn-info" onclick="billModal(' . $fault->id . ')"><i class="fas fa-money-bill"></i> &nbspFaturalandır</a>';
                }
            })
            ->addColumn('show', function ($fault) {
                return '<a class="btn btn-primary" onclick="detailModal(' . $fault->id . ')"><i class="fas fa-eye"></i> &nbspDetay</a>';
            })
            ->addColumn('update', function ($fault) {
                return '<button title="Güncelle" class="btn btn-warning updateElevatorsModal" data-bs-toggle="modal"
                        data-bs-target="#faultsUpdateModal" id ="fault-id" value="'.$fault->id.'"><i class="fas fa-edit"></i> Güncelle</button>';
            })
            ->addColumn('delete', function ($fault) {
                return '<a class="btn btn-danger" onclick="productsDelete(' . $fault->id . ')"><i class="fas fa-trash"></i> Sil</a>';
            })
            ->rawColumns(['description','status','solved_time','transaction_id','transaction', 'show','update', 'delete'])
            ->make();
    }

    public function createBill(Request $request) {
        $transaction = new Transaction();
        $transaction->cost = $request->cost;
        $transaction->description = $request->description;
        $transaction->transaction_type = $request->transaction_type;
        $fault = Fault::where('id','=',$request->fault_id)->first();
        $elevator = Elevator::where('id',$fault->elevator_id)->first();
        $transaction->user_id = $elevator->user_id;
        $transaction->save();
        $fault->transaction_id = $transaction->id;
        $fault->save();
        return response()->json(['Success' => 'success']);
    }

    public function createIndex() {
        return view('admin.fault.create');
    }

    public function checkUserPhone(Request $request){
        $phone = User::where('phone',$request->phone)->first();
        if (isset($phone)){
            return  response()->json(['result' => True]);
        }
        return  response()->json(['result' => False]);
    }

    public function getUserElevator(Request $request){
        $user = User::where('phone',$request->phone)->first();
        $elevator = Elevator::where('user_id',$user->id)->get();
        if(isset($elevator)){
            return $elevator;
        }
    }

    public function createPost(Request $request){
        $request->validate([
            'elevator' => 'required',
            'description' => 'required',
        ]);

        $fault = new Fault();
        $fault->user_id = Auth::id();
        $fault->elevator_id = (Elevator::where('key_code',$request->elevator)->first())->id;
        $fault->description = $request->description;
        $fault->down_time = Carbon::now('Europe/Istanbul')->toDateTimeString();
        $fault->save();

        toastr()->success('Arıza Kaydı Başarıyla Oluşturuldu', 'Başarılı');
        return redirect()->route('fault.index');
    }
    public function update(Request $request){
        $request->validate([
            'fault_id' => 'required|exists:faults,id',
            'description' => 'required',
            'durum' => 'required|in:0,1',
        ]);
        $user = Auth::user();
        $fault = Fault::where('id',$request->fault_id)->first();
        $fault->status = $request->durum;
        $fault->description = $fault->description.' '.$user->name.' '.$user->surname.' Yanıt => '.$request->description;
        $fault->solved_time= Carbon::now('Europe/Istanbul')->toDateTimeString();
        $fault->save();
        return response()->json(['Success' => 'success']);

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
    public function delete(Request $request){
        $delete = Fault::where('id',$request->id)->first();
        $delete->delete();
        return response()->json(['Success' => 'success']);
    }
}
