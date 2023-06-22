<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Fault;
use App\Models\Repair;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class RepairController extends Controller
{
    public function index() {
        return view('admin.repair.index');
    }

    public function fetch(){
        $repair = Repair::all();
        return DataTables::of($repair)
            ->editColumn('description', function ($repair) {
                return strip_tags(Str::limit($repair->description,50));
            })
            ->editColumn('status', function ($repair) {
                if($repair->status == 0){
                    return $repair->status = 'Bakıma Yapılmadı';
                }
                return  $repair->status = 'Bakım Yapıldı';
            })
            ->editColumn('transaction_id', function ($repair) {
                if($repair->transaction_id == null){
                    return $repair->transaction_id = 'Henüz Fatura Oluşturulmadı';
                }
                return  $repair->transaction_id ;
            })
            ->addColumn('show', function ($repair) {
                return '<a class="btn btn-primary" onclick="detailModal(' . $repair->id . ')"><i class="fas fa-eye"></i> &nbspDetay</a>';
            })
            ->addColumn('update', function ($repair) {
                return '<button title="Güncelle" class="btn btn-warning updateElevatorsModal" data-bs-toggle="modal"
                        data-bs-target="#repairsUpdateModal" id ="repair-id" value="'.$repair->id.'"><i class="fas fa-edit"></i> Güncelle</button>';
            })
            ->addColumn('delete', function ($repair) {
                return '<a class="btn btn-danger" onclick="productsDelete(' . $repair->id . ')"><i class="fas fa-trash"></i> Sil</a>';
            })
            ->rawColumns(['description','status','solved_time','transaction_id', 'show','update', 'delete'])
            ->make();
    }

    public function createIndex() {
        return view('admin.repair.create');
    }

    public function createPost(Request $request){
        $request->validate([
            'elevators' => 'required',
            'repair_time' => 'required',
        ]);

        foreach ($request->elevators as $elevator){
            $repair = new Repair();
            $repair->elevator_id = (Elevator::where('key_code',$elevator)->first())->id;
            $repair->description = 'Bakım Gününden Evde Olmayı Unutmayın';
            $repair->repair_time = $request->repair_time;
            $repair->save();
        }
        toastr()->success('Bakım Kaydı Başarıyla Oluşturuldu', 'Başarılı');
        return redirect()->route('repair.index');
    }
    public function update(Request $request){
        $request->validate([
            'repair_id' => 'required|exists:repairs,id',
            'description' => 'required',
            'durum' => 'required|in:0,1',
        ]);
        $user = Auth::user();
        $repair = Repair::where('id',$request->repair_id)->first();
        $repair->status = $request->durum;
        $repair->description = $repair->description.' '.$user->name.' '.$user->surname.' Yanıt => '.$request->description ;
        $repair->save();
        return response()->json(['Success' => 'success']);
    }

    public function detail(Request $request){
        $repair = Repair::where('id',$request->id)->first();
        $elevator = Elevator::where('id',$repair->elevator_id)->first();
        $user = User::where('id',$elevator->user_id)->first();
        $data =[
            ['repair_description' => $repair->description],
            ['user' => $user]
        ];
        return response()->json($data);
    }
    public function delete(Request $request){
        $delete = Repair::where('id',$request->id)->first();
        $delete->delete();
        return response()->json(['Success' => 'success']);
    }
}
