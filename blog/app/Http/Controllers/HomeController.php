<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    public function getHome()
    {
      $posts = Post::all();
      return view('index',compact('posts'));
    }

    public function getArticleDetail($id)
    {
      $post = Post::find($id);
      return view('detail',compact('post'));
    }
}
