<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function __construct()
   {
     $this->middleware('auth');
   }
    public function getCategories()
    {
      $categories = Category::all();
      return view('admin.categories.index',compact('categories'));
    }

    public function createCategory()
    {
      return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required||unique:categories',
      ]);
      $category = new Category();
      $category->name = $request->name;
      if($category->save()){
        return redirect(route('admin.dashboard.categories.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    public function editCategory($id)
    {
      $category = Category::find($id);
      return view('admin.categories.edit',compact('category'));
    }

    public function updateCategory(Request $request,$id)
    {
      $validated = $request->validate([
        'name' => 'required|',
      ]);
      $category = Category::find($id);
      $category->name = $request->name;
      if($category->save()){
        return redirect(route('admin.dashboard.categories.index'))->withSuccess('The data has been updated');
      }else{
        return back();
      }
    }

    public function deleteCategory($id)
    {
      $category = Category::find($id);
      if($category->delete()){
        return redirect(route('admin.dashboard.categories.index'))->withSuccess('The data has been deleted');
      }else{
        return back();
      }
    }
}
