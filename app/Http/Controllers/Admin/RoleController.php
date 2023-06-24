<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Permission\Permission as HelperPermission;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index');
    }

    public function fetch(){
        $roles = Role::all();
        return DataTables::of($roles)->editColumn('content', function ($data){
        })->addColumn('created_at', function ($data){
            return $data->created_at;
        })->addColumn('updated_at', function ($data){
            return $data->updated_at;
        })->addColumn('update', function ($data){
            return '<a href="" class="btn btn-warning">Güncelle</a>';
        })->addColumn('delete', function ($data){
            return '<a data-toggle="tooltip" onclick="deleted('.$data->id.')" data-target="#detail_modal" class="btn btn-danger">Sil</a>';
        })->rawColumns(['delete','created_at','updated_at','update','content'])->make();
    }

    public function create(){
        $permissions = new HelperPermission();
        return view('admin.role.create',compact('permissions'));
    }

    public function createPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions.*' => 'exists:permissions,name',
        ]);
        $role = new  Role();
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();
        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index');
    }
    public function delete(Request $request){
        $request->validate([
            'id' => 'required|exists:roles,id',
        ]);
        $role = Role::where('id',$request->id)->first();
        $role->delete();
        return response()->json(['Success' => 'success']);
    }
    public function update(Request $request){
        $user = User::where('id',$request->user_id)->first();
        $user->syncRoles($request->staff_id);
        return response()->json(['Success' => 'success']);
    }


}
