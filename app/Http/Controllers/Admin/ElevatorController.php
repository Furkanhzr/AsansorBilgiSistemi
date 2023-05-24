<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ElevatorController extends Controller
{
//    public function index() {
//        return view('admin.elevators.index');
//    }

    public function fetch() {
        $elevators = Elevator::query();
        return DataTables::of($elevators)
            ->addColumn('update', function ($elevators) {
                return '<button title="Güncelle" class="btn btn-warning updateElevatorsModal" data-bs-toggle="modal"
                        data-bs-target="#elevatorTypesUpdateModal" data-id="'.$elevators->id.'"><i class="fas fa-edit"></i> Güncelle</button>';
            })
            ->addColumn('delete', function ($elevators) {
                return '<a class="btn btn-danger" onclick="elevatorsDelete(' . $elevators->id . ')"><i class="fas fa-trash"></i> Sil</a>';

            })
            ->rawColumns(['update', 'delete'])
            ->make();
    }

    public function create(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $elevator = new Elevator();
        $elevator->name = $request->name;
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
            'name' => 'required',
        ]);

        $elevator = Elevator::find($request->id);
        $elevator->name = $request->name;
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
