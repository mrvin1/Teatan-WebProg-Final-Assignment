<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Drink;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DrinkController extends Controller
{
    public function get(){
        $drink = Drink::all();

        return view('manage-drink', ['drinks' => $drink]);
    }

    public function getDetail($id){
        $drink = Drink::find($id);
        return view('drink-detail', ['drink' => $drink]);
    }

    public function add(Request $req){
        $req->validate([
            'name' => ['required'],
            'synopsis' => ['required'],
            'cover' => ['required','image','mimes:jpeg,png,jpg'],
            'price' => ['required','integer'],
        ]);

        $drink = new Drink();
        $drink->name = $req->name;
        $drink->synopsis = $req->synopsis;

        $img_name = time() . '.' . $req->cover->extension();
        Storage::putFileAs('public/images', $req->cover, $img_name);
        $img_name = 'images/' . $img_name;
        $drink->cover = $img_name;
        $drink->price = $req->price;

        $drink->save();

        return redirect()->back();
    }

    public function delete($id){
        $drink = Drink::find($id);

        if(isset($drink)){
            Storage::delete('public/'.$drink->cover);
            $drink->delete();
        }
        return redirect()->back()->withErrors('Drink Deleted');
    }

    public function update(Request $req, $id){
        $drink = Drink::find($id);
        Validator::make($req->all(),[
            'name' => 'required',
            'synopsis' => 'required',
            'cover' => 'image',
            'price'=> 'required|numeric'
        ])->validate();
        $drink->name = $req->name;
        $drink->synopsis = $req->synopsis;
        $drink->price = $req->price;
        $image = $req->file('cover');

        if($image != null)
        {
            $CoverName = time() . '.' . $image->getClientOriginalExtension();
            Storage::putFileAs('public', $image,$CoverName);
            Storage::delete('/public',$drink->cover);
            $drink->cover = $CoverName;
        }
        else{
            $req->cover = $drink->cover;
        }
        $drink->save();
    
        return redirect()->back(); 
    }

    
}
