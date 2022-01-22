<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function get(){
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function update(Request $request){
        User::find(Auth::user()->id)->update(['name' => $request->name]);
        return redirect()->back();
    }
}
