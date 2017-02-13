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

    public function add()
    {
        $data = ['m1' => 'Hy', 'm2' => ' Rom'];
        return view('add-content')->with($data);
    }

    public function insert(Request $request)
    {
        $this->validate($request, [
            'email' =>'required|max:10',
            'pwd' =>'required'

        ]);
        $data = $request->all();
        $articles = new Article();
        $articles->fill(array('descr' => $data['pwd'], 'name' => $data['email']));
        $articles->save();


        return redirect('/');
    }
}
