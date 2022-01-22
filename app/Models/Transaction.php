<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function details(){
        return $this->hasMany(TransactionDetail::class);
    }

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->format('d, M Y H:i');
    }
}
