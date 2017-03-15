<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use App\Helpers\Contracts\SaveStr;

class SaveEloquentOrm implements SaveStr {


    public static function save(Request $request){

        $obj = new self;
        $data = $obj->checkData($request->all());
    }

    public function checkData($array){

      //  dump($array);
        return $array;
    }
}