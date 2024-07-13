<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use HasFactory;

    public function converation()
    {
        $relationship1 = $this->hasMany(conversation::class,'chat_id','id');
        $relationship2 = $this->hasMany(conversation::class,'user_id','id');
        if($relationship1) return $relationship1;
        else return $relationship2;
        
    }

   
}
