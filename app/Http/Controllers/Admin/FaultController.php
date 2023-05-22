<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Image;
use App\Models\Fault;
use App\Models\User;
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
            ->addColumn('show', function ($fault) {
                return '<a href="'. route('products.single',$fault->id) .'" class="btn btn-info" ><i class="fas fa-eye"></i> &nbspGöster</a>';
            })
            ->addColumn('update', function ($fault) {
                return '<a href="'. route('products.update.index',$fault->id) .'" class="btn btn-warning" ><i class="fas fa-edit"></i> Güncelle</a>';
            })
            ->addColumn('delete', function ($fault) {
                return '<a class="btn btn-danger" onclick="productsDelete(' . $fault->id . ')"><i class="fas fa-trash"></i> Sil</a>';
            })
            ->rawColumns(['description','status','solved_time','transaction_id', 'show','update', 'delete'])
            ->make();
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
        $fault->down_time = now();
        $fault->solved_time= now();
        $fault->save();

        toastr()->success('Arıza Kaydı Başarıyla Oluşturuldu', 'Başarılı');
        return redirect()->route('fault.index');
    }
}
