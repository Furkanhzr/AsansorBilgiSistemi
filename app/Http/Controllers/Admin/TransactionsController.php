<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fault;
use App\Models\Repair;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TransactionsController extends Controller
{
    public function index() {
        return view('admin.transactions.index');
    }

    public function fetch() {
        $transaction = Transaction::all();
        return DataTables::of($transaction)
            ->editColumn('description', function ($transaction) {
                return strip_tags(Str::limit($transaction->description,50));
            })
            ->editColumn('status', function ($transaction) {
                if($transaction->status == 0){
                    return $transaction->status = 'Ödenmedi';
                }
                return  $transaction->status = 'Ödendi';
            })
            ->editColumn('payment_time', function ($transaction) {
                if($transaction->payment_time == null){
                    return $transaction->status = '-';
                }
                return  $transaction->payment_time;
            })
            ->editColumn('user_id', function ($transaction) {
                return $transaction->getUser->name;
            })
            ->addColumn('phone', function ($transaction) {
                return $transaction->getUser->phone;
            })
            ->addColumn('delete', function ($transaction) {
                return '<a class="btn btn-danger" onclick="transactionsDelete(' . $transaction->id . ')"><i class="fas fa-trash"></i> Sil</a>';
            })
            ->rawColumns(['description','status','phone','user_id', 'payment_time','delete'])
            ->make();
    }


    public function createIndex() {
        return view('admin.transactions.create');
    }

    public function createPost(Request $request) {
        $user = User::where('phone',$request->phone)->first();
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->cost = $request->cost;
        $transaction->status = 0;
        $transaction->description = $request->description;
        $transaction->transaction_type = 0;
        $transaction->save();
        return $this->index();
    }
    public function phonecheck(Request $request) {
        $phone = User::where('phone',$request->phone)->first();
        if (isset($phone)){
            return  response()->json(['result' => True]);
        }
        return  response()->json(['result' => False]);
    }

    public function delete(Request $request){
        $delete = Transaction::where('id',$request->id)->first();
        if($delete->transaction_type == 0){
            $delete->delete();
            return response()->json(['Success' => 'success']);
        }
        elseif ($delete->transaction_type == 1){
            $fault = Fault::where('transaction_id','=',$delete->id)->first();
            $fault->transaction_id = null;
            $fault->save();
            $delete->delete();
            return response()->json(['Success' => 'success']);
        }
        elseif ($delete->transaction_type == 2){
            $repair = Repair::where('transaction_id','=',$delete->id)->first();
            $repair->transaction_id = null;
            $repair->save();
            $delete->delete();
            return response()->json(['Success' => 'success']);
        }
    }
}
