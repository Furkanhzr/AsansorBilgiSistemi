<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ElevatorType;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ElevatorTypeController extends Controller
{
    public function index() {
        return view('admin.elevators.elevator_types.index');
    }

    public function fetch() {
        $elevator_types = ElevatorType::query();
        return DataTables::of($elevator_types)
            ->addColumn('update', function ($elevator_types) {
                return '<button title="Güncelle" class="btn btn-warning updateElevatorTypesModal" data-bs-toggle="modal"
                        data-bs-target="#elevatorTypesUpdateModal" data-id="'.$elevator_types->id.'"><i class="fas fa-edit"></i> Güncelle</button>';
            })
            ->addColumn('delete', function ($elevator_types) {
                return '<a class="btn btn-danger" onclick="elevatorTypesDelete(' . $elevator_types->id . ')"><i class="fas fa-trash"></i> Sil</a>';

            })
            ->rawColumns(['update', 'delete'])
            ->make();
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $elevator_type = new ElevatorType();
        $elevator_type->name = $request->name;
        $elevator_type->save();

//        toastr()->success('Asansör Türü Başarıyla Oluşturuldu', 'Başarılı');
        return response()->json(['Success' => 'success']);
    }

    public function edit($id){
        $elevator_type = ElevatorType::find($id);
        return $elevator_type;
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $elevator_type = ElevatorType::find($request->id);
        $elevator_type->name = $request->name;
        $elevator_type->save();

//        toastr()->success('Asansör Türü Başarıyla Güncellendi', 'Başarılı');
        return response()->json(['Success' => 'success']);
    }

    public function delete(Request $request) {
        $elevator_type = ElevatorType::find($request->id);
        $elevator_type->delete();
        return response()->json(['Success' => 'success']);
    }
}
