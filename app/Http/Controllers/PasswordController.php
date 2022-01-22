<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PasswordController extends Controller
{
    public function get()
    {
        return view('change-password');
    }

    public function update(Request $request)
    {

        $request->validate([
            'old_pass' => ['required'],
            'new_pass' => ['required', 'min:8', 'different:old_pass'],
            'confirm_pass' => ['required', 'same:new_pass']
        ]);

        $user = Auth::user();

        if(Hash::check($request->old_pass, $user->password)){
            $user->password = Hash::make($request->new_pass);
            $user->save();
            return redirect()->back()->with('alert', 'Password Changed');
        }

        return redirect()->back()->with('alert', 'Invalid Password');





    }

}
