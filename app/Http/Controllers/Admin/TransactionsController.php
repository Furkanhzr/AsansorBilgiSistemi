<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fault;
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

    public function createPost() {
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
        $fault = Fault::where('transaction_id','=',$delete->id)->first();
        $fault->transaction_id = null;
        $delete->delete();
        return response()->json(['Success' => 'success']);
    }
}
