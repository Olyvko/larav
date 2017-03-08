<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //public $casts = ['name' => 'boolean'];//return bool for flags
    //public $casts = ['name' => 'array'];//can add arr, convert to string
    //
    public function article(){
        return $this->belongsTo('App\Article');
    }
}
