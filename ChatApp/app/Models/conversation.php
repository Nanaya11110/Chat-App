<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class conversation extends Model
{
    use HasFactory;

    public function messenge()
    {
        return $this->hasMany(messenge::class,'conversations_id','id');
    }

    public function latesMessenge()
    {
        return $this->hasOne(messenge::class,'conversations_id','id')->latest();
    }
   

}
