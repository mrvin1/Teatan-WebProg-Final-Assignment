<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "drinks";

    public function cart(){
        return $this->hasOne(Cart::class);
    }

    public function detail(){
        return $this->hasOne(TransactionDetail::class);
    }
}
