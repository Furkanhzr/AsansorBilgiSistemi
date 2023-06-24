<?php

namespace App\Http\Controllers\Online;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServicesController extends Controller
{
    public function index() {
        return view('online.services.index');
    }

    public function fetch() {
        $transaction = Transaction::where('user_id','=',Auth::id())->get();
        return DataTables::of($transaction)
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
            ->rawColumns(['status','payment_time','transaction_type'])
            ->make();
    }
}
