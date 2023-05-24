<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Elevator;
use App\Models\ElevatorType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\User;

class ElevatorController extends Controller
{
    public function index() {
        $elevatorTypes = ElevatorType::all();
        $users = User::all();
        return view('admin.elevators.index',compact('elevatorTypes','users'));
    }

    public function fetch() {
        $elevators = Elevator::query();
        return DataTables::of($elevators)
            ->addColumn('user_id', function ($elevators) {
                if (isset($elevators->getUser)) {
                    $user = $elevators->getUser->name;
                }
                else {
                    $user = "Belirtilmedi";
                }
                return $user;
            })
            ->addColumn('status', function ($elevators) {
                if ($elevators->status == 0) {
                    $status = "Stokta";
                }
                else {
                    $status = "Satıldı";
                }
                return $status;
            })
            ->addColumn('update', function ($elevators) {
                return '<button title="Güncelle" class="btn btn-warning updateElevatorsModal" data-bs-toggle="modal"
                        data-bs-target="#elevatorsUpdateModal" data-id="'.$elevators->id.'"><i class="fas fa-edit"></i> Güncelle</button>';
            })
            ->addColumn('delete', function ($elevators) {
                return '<a class="btn btn-danger" onclick="elevatorsDelete(' . $elevators->id . ')"><i class="fas fa-trash"></i> Sil</a>';
            })
            ->rawColumns(['status','user_id','update', 'delete'])
            ->make();
    }

    public function create(Request $request) {
        $request->validate([
            'elevator_type_id' => 'required',
            'key_code' => 'required|size:16|unique:elevators',
        ]);

        $elevator = new Elevator();
        $elevator->elevator_type_id = $request->elevator_type_id;
        $elevator->user_id = $request->user_id;
        $elevator->status = 0;
        $elevator->key_code = $request->key_code;
        $elevator->save();

//        toastr()->success('Asansör Başarıyla Oluşturuldu', 'Başarılı');
        return response()->json(['Success' => 'success']);
    }

    public function edit($id){
        $elevator = Elevator::find($id);
        return $elevator;
    }

    public function update(Request $request) {
        $request->validate([
            'elevator_type_id' => 'required',
            'key_code' => 'required|size:16|unique:elevators,key_code,' . $request->id,
        ]);

        $elevator = Elevator::find($request->id);
        $elevator->elevator_type_id = $request->elevator_type_id;
        $elevator->user_id = $request->user_id;
        $elevator->status = 0;
        $elevator->key_code = $request->key_code;
        $elevator->save();

//        toastr()->success('Asansör Başarıyla Güncellendi', 'Başarılı');
        return response()->json(['Success' => 'success']);
    }

    public function delete(Request $request) {
        $elevator = Elevator::find($request->id);
        $elevator->delete();
        return response()->json(['Success' => 'success']);
    }
}
