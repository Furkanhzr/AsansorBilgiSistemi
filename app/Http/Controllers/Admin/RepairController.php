<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Elevator;
use App\Models\Fault;
use App\Models\Repair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    public function index() {
        return view('admin.repair.index');
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
}
