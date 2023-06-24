<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class BillsController extends Controller
{
    public function index() {
        return view('online.transactions.index');
    }

    public function fetch() {
        $transaction = Transaction::where('user_id','=',Auth::id())->get();
        return DataTables::of($transaction)
            ->editColumn('description', function ($transaction) {
                return strip_tags(Str::limit($transaction->description,50));
            })
            ->editColumn('status', function ($transaction) {
                if($transaction->status == 0) {
                    return 'Ödenmedi';
                }
                else {
                    return 'Ödendi';
                }
            })
            ->editColumn('transaction_type', function ($transaction) {
                if($transaction->transaction_type == 0) {
                    return "Kurulum";
                }
                else if($transaction->transaction_type == 1) {
                    return "Arıza";
                }
                else if($transaction->transaction_type == 2) {
                    return "Bakım";
                }
            })
            ->editColumn('payment_time', function ($transaction) {
                if($transaction->payment_time == null){
                    return $transaction->status = '-';
                }
                return  $transaction->payment_time;
            })
            ->addColumn('pay', function ($transaction) {
                if($transaction->status == 0) {
                    return '<a class="btn btn-info" onclick="billModal(' . $transaction->id . ')"><i class="fas fa-money-bill"></i> &nbspÖdeme Yap</a>';
                }
                else {
                    return '<button class="btn btn-success" disabled><i class="fas fa-money-bill"></i> &nbspÖdendi</a>';
                }
            })
            ->rawColumns(['description','status', 'pay','payment_time','transaction_type'])
            ->make();
    }


    public function pay(Request $request) {
        $transaction = Transaction::find($request->id);
        $transaction->status = 1;
        $transaction->payment_time = Carbon::now('Europe/Istanbul')->toDateTimeString();
        $transaction->save();
        return response()->json(['Success' => 'success']);
    }
}
