<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use Auth;
use Image;
use File;
use Storage;
class PostController extends Controller
{
    public function __construct()
   {
     $this->middleware('auth');
   }
    public function getPosts()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function createPost()
    {
      $categories = Category::all();
      $subcategories = SubCategory::all();
      return view('admin.posts.create',compact('categories','subcategories'));
    }

    public function storePost(Request $request)
    {
      if (!empty($request->image)) {
          $fileName = time().'.'.$request->image->getClientOriginalName();
      }
      $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'sub_category_id' => 'required'
      ]);

      $post = new Post();
      $post->title = $request->title;
      $post->description = $request->description;
      $post->category_id = $request->category_id;
      $post->sub_category_id = $request->sub_category_id;
      $post->user_id = Auth::User()->id;
      if (!empty($request->image)) {
            $image = $request->image;
            $post->image = $fileName;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(960, 500);
            $image_resize->save(public_path('assets/uploads/posts/'.$fileName));
      }
      if($post->save()){
        return redirect(route('admin.dashboard.posts.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    public function editPost($id)
    {
      $categories = Category::all();
      $subcategories = SubCategory::all();
      $post = Post::find($id);
      return view('admin.posts.edit',compact('categories','subcategories','post'));
    }

    public function updatePost(Request $request,$id)
    {
      if (!empty($request->image)) {
          $fileName = time().'.'.$request->image->getClientOriginalName();
      }
      $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'sub_category_id' => 'required'
      ]);

      $post = Post::find($id);
      $post->title = $request->title;
      $post->description = $request->description;
      $post->category_id = $request->category_id;
      $post->sub_category_id = $request->sub_category_id;
      $post->user_id = Auth::User()->id;
      if (!empty($request->image)) {
            $image = $request->image;
            $post->image = $fileName;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(960, 500);
            $image_resize->save(public_path('assets/uploads/posts/'.$fileName));
      }
      if($post->save()){
        return redirect(route('admin.dashboard.posts.index'))->withSuccess('The data has been updated');
      }else{
        return back();
      }
    }

    public function deletePost($id)
    {
      $post = Post::find($id);
      if($post->delete()){
        return redirect(route('admin.dashboard.posts.index'))->withSuccess('The data has been deleted');
      }else{
        return back();
      }
    }
}
