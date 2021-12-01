<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ficha;

class Programa extends Model
{
    use HasFactory;

    function ficha(){
        return $this->hasMany(Ficha::class); 
    }
}
