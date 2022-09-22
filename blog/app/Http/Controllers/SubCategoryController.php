<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    public function __construct()
   {
     $this->middleware('auth');
   }
    public function getSubCategories()
    {
      $subcategories = SubCategory::all();
      return view('admin.subcategories.index',compact('subcategories'));
    }

    public function createSubCategory()
    {
        $categories = Category::all();
      return view('admin.subcategories.create',compact('categories'));
    }

    public function storeSubCategory(Request $request)
    {
      $validated = $request->validate([
        'name' => 'required|unique:sub_categories',
        'category_id' => 'required',
      ]);
      $subcategory = new SubCategory();
      $subcategory->name = $request->name;
      $subcategory->category_id = $request->category_id;
      if($subcategory->save()){
        return redirect(route('admin.dashboard.subcategories.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    public function editSubCategory($id)
    {
        $categories = Category::all();
        $subcategory = SubCategory::find($id);
        return view('admin.subcategories.edit',compact('subcategory','categories'));
    }

    public function updateSubCategory(Request $request,$id)
    {
      $validated = $request->validate([
        'name' => 'required',
        'category_id' => 'required',
      ]);
      $subcategory = SubCategory::find($id);
      $subcategory->name = $request->name;
      $subcategory->category_id = $request->category_id;
      if($subcategory->save()){
        return redirect(route('admin.dashboard.subcategories.index'))->withSuccess('The data has been updated');
      }else{
        return back();
      }
    }

    public function deleteSubCategory($id)
    {
      $subcategory = SubCategory::find($id);
      if($subcategory->delete()){
        return redirect(route('admin.dashboard.subcategories.index'))->withSuccess('The data has been deleted');
      }else{
        return back();
      }
    }
}
