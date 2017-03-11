<?php

namespace App\Http\Controllers;

use App\Photo;
use App\User;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Event;
use App\Events\onAddArticleEvent;

class MyController extends Controller
{
    public function index()
    {
      //  var_dump(Auth::check());

        $res = Article::all();
        $data = ['m1' => 'Hy', 'm2' => ' Rom', 'res' => $res];


/*        // get view config
        $path = config('view.path');
        //get not blade file
         return view()->file($path[0].'/your_file');*/

        //check if view isset
        //view - vendor/laravel/framework/src/Illuminate/View/Factory.php

        if(view()->exists('my')) {
            $view = view('my')->with($data)->render();
            return (new Response($view));
            // return response($view);
        }

        abort(404);
    }

    public function show($id)
    {
        $article = Article::select(['id', 'name'])->where('id', $id)->first();
        $data = ['m1' => 'Hy', 'm2' => ' Rom', 'article' => $article];

/*        //test db
        $art = DB::select("Select * from articles where id = :id", ['id'=>1]);
        DB::insert("Insert into articles (name,descr) values (?, ?)", ['test1', 'test2']);
        $id = DB::connection()->getPDO()->lastInsertId();
        DB::update("Update articles set descr = ? where id = ?", ['tewt2', 2]);
        DB::delete("Delete from articles where id = ?", [3]);
        DB::statement('delete from articles where id = 4');//загальні запити*/

/*        //QUERY class BUILDER
        $res = DB::table('articles')->get(); //get all
        $res = DB::table('articles')->first(); //get first, pluck - all
        $res = DB::table('articles')->value('descr'); //set select val
        DB::table('articles')->chunk(1, function ($art) {
            dump($art);
        }); // розбиває на частини рез
        $art = DB::table('articles')->distinct()->select('name')->where('id','=',1)->get();
        $res = DB::table('articles')->insertGetId(['name' => 't1', 'descr' => 't2']);*/

        //MODELS
        //Article::create(['name' => 222, 'descr' => 111]);//need add to fillable

  /*      //Relations
        //One to One
        $art = Article::find(1); dump($art->photo);
        $photo = Photo::find(1); dump($photo->article);

        //One to many
        $user = User::find(1); dump($user->articles);
        $art = Article::find(1); dump($art->user);
        //жадне звязування
        Article::with('user'); $art = Article::all(); $art->load('user');

        //save
        $user = User::find(1);
        $article = new Article([...]);
        $user->article()->save($article);//create(),saveMany()

        //change relation to article
        $photo = Photo::find(1);
        $art = Article::find(2);
        $photo->article()->associate($art);
        $photo->save();

        //for many to many, add new
        $us->roles()->atach($rrol_id); //detach() - delete
        $photo->toArray()// - to arr, toJson() - to string json*/

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

        //OR
        /*
        // can add new Request
        $messages = [];
        $val = Validator::make($request->all(), [
                'email' =>'required|max:10',
                'pwd' =>'required'
            ], $messages);
        if($val->fails()) {
            //!!add session start
            redirect()->route('myAdd')->withErrors($val)->withInput();
        }
        */

        $data = $request->all();
        $articles = new Article();
        $articles->fill(array('descr' => $data['pwd'], 'name' => $data['email']));
        $articles->save();

        Event::fire(new onAddArticleEvent($articles));

        return redirect('/');
    }
}
