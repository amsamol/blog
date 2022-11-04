<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAboutUs()
    {
      $abouts = About::all();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAboutUs()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAboutUs(Request $request)
    {
      $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
      ]);

      $about = new About();
      $about->title = $request->title;
      $about->description = $request->description;
      if($about->save()){
        return redirect(route('admin.dashboard.abouts.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function editAboutUs($id)
    {
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function updateAboutUs(Request $request, $id)
    {
      $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
      ]);

      $about = About::find($id);
      $about->title = $request->title;
      $about->description = $request->description;
      if($about->save()){
        return redirect(route('admin.dashboard.abouts.index'))->withSuccess('The data has been updated');
      }else{
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroyAboutUs($id)
    {
      $about = About::find($id);
      if($about->delete()){
        return redirect(route('admin.dashboard.abouts.index'))->withSuccess('The data has been deleted');
      }else{
        return back();
      }
    }
}
