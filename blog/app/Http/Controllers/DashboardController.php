<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Comment;
class DashboardController extends Controller
{
  public function __construct()
   {
     $this->middleware('auth');
   }
    public function getDashbaord()
    {
      $countUser = User::all()->count();
      $countCategories = Category::all()->count();
      $countSubCategories = SubCategory::all()->count();
      $countPosts = Post::all()->count();
      $countComments = Comment::all()->count();
      return view('admin.index',compact('countUser','countCategories','countSubCategories','countPosts','countComments'));
    }
}
