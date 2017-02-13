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

    public function show($id)
    {
        $article = Article::select(['id', 'name'])->where('id', $id)->first();
        $data = ['m1' => 'Hy', 'm2' => ' Rom', 'article' => $article];

        return view('my-content')->with($data);
    }
}
