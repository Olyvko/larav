<?php

namespace App\Helpers\Contracts;
use Illuminate\Http\Request;

interface SaveStr {

    public static function save(Request $request);

    public function checkData($array);
}