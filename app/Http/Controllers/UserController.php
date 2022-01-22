<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Description;

class UserController extends Controller
{
    public function get(){
        $users = User::all();
        return view('manage-user', ['users' => $users]);
    }

    public function getDetail($id){
        $user = User::find($id);
        return view('user-detail', ['user' => $user]);
    }

    public function update(Request $req, $id){
        $req->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'name' => ['required'],
            'role' => ['required','in:admin,user']
        ]);

        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->role = $req->role;
        $user->save();
        return redirect()->back();
    }

    public function delete($id){
        $user = User::find($id);

        if(isset($user)){
            $user->delete();
            return redirect()->back()->withErrors('Genre Deleted');
        }

        return redirect()->back();
    }


}
