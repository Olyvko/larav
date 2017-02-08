<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class MyController extends Controller
{
    public function index()
    {
        $res = Article::all();
        $data = ['m1' => 'Hy', 'm2' => ' Rom', 'res' => $res];

        return view('my')->with($data);
    }
}
