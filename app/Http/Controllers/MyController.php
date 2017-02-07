<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyController extends Controller
{
    public function index()
    {
        $data = ['m1' => 'Hy', 'm2'=>' Rom'];

        return view('my')->with($data);
    }
}
