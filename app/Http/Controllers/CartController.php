<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function get(){
        $carts = Cart::all()->where('user_id', Auth::user()->id);
        return view('cart', ['carts' => $carts]);
    }

    public function add(Request $req, $id){
        $req->validate([
           'quantity' => ['required', 'min:1']
        ]);

        if(Cart::where('drink_id', $id)->where('user_id', Auth::user()->id)->update(['quantity' => $req->quantity]) == 1){
            Cart::where('drink_id', $id)->where('user_id', Auth::user()->id)->update(['quantity' => $req->quantity]);
        }else{
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->drink_id = $id;
            $cart->quantity = $req->quantity;
            $cart->save();
        }
        return redirect()->back();
    }

    public function update(Request $req, $id){
        $req->validate([
            'quantity' => ['required', 'min:1']
        ]);
        Cart::find($id)->update(['quantity' => $req->quantity]);
        return redirect()->back();
    }

    public function delete($id){
        $cart = Cart::find($id);

        if(isset($cart)){
            $cart->delete();
        }
        return redirect()->back();
    }

    public function getEdit($id){
        $cart = Cart::find($id);
        return view('edit-cart', ['cart' => $cart]);
    }
}
