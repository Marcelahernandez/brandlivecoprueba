<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
    protected $table = 'palabras';

    public static function  palabras($numero, $palabra){
       return Palabra::whereRaw('LENGTH(palabra) =?', [$numero])->where('palabra', 'like', $palabra.'%')->get();
    }
}
