<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function add(Request $request){
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->grand_total = 0;
        $transaction->save();

        $grand_total = 0;

        foreach ($carts as $cart){
            $detail = new TransactionDetail();
            $detail->quantity = $cart->quantity;
            $detail->subtotal = $cart->quantity * $cart->drink->price;
            $detail->drink_id = $cart->drink->id;
            $detail->transaction_id = $transaction->id;
            $grand_total += $cart->quantity * $cart->drink->price;
            $detail->save();
        }

        $transaction->grand_total = $grand_total;
        $transaction->save();

        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->back();
    }

    public function get(){
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        return view('transaction-history', ['transactions' => $transactions]);
    }

    public function getDetail($id){
        $transaction = Transaction::find($id);
        return view('transaction-detail', ['transaction' => $transaction]);
    }
}
