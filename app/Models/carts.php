<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;

    protected $fillable=["c_id","user_id","p_id","c_mass","c_price","c_status"];

    public function product(){
        return $this->belongsTo(products::class,'p_id');
    }
}
