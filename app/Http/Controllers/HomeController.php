<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{


    public function index(){
      $posts = Post::all();
      return view('home')->with(['posts'=>$posts]);
    }
}
