<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Slider;
class HomeController extends Controller
{
    public function getHome()
    {
      $posts = Post::all();
      $sliders = Slider::all();
      return view('index',compact('posts','sliders'));
    }

    public function getArticleDetail($id)
    {
      $post = Post::find($id);
      return view('detail',compact('post'));
    }

    public function getTutorials()
    {
      $posts = Post::orderBy('id','DESC')->paginate(4);
      return view('tutorial',compact('posts'));
    }
}
