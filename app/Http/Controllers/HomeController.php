<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Drink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function get(){
        $drink = Drink::paginate(6);
        return view('home', ['drinks' => $drink]);
    }

    public function searchDrink(Request $request){
        $query = $request->search;
        $drink = Drink::where('name','LIKE',"%$query%")->paginate(6);
        return view('home',['drinks'=>$drink]);
    }
}
