<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function show(Request $request){

        $u = Auth::user();
        $u = $request->user();
        if(Auth::check()) {

        }

        $u = User::find(1);
      //  Auth::guard('web')->login($u); // залогінення користувача вручну
      //  Auth::guard('web')->logout();

        //  dump($u);
        return view('welcome');
    }
}
