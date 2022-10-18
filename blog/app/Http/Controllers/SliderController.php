<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSliders()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSlider()
    {
      return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSlider(Request $request)
    {
      if (!empty($request->image)) {
          $fileName = time().'.'.$request->image->getClientOriginalName();
      }
      $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);

      $slider = new Slider();
      $slider->name = $request->name;
      $slider->description = $request->description;
      if (!empty($request->image)) {
            $image = $request->image;
            $slider->image = $fileName;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(960, 500);
            $image_resize->save(public_path('assets/uploads/sliders/'.$fileName));
      }
      if($slider->save()){
        return redirect(route('admin.dashboard.sliders.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function editSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function updateSlider(Request $request,$id)
    {
      if (!empty($request->image)) {
          $fileName = time().'.'.$request->image->getClientOriginalName();
      }
      $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);

      $slider = Slider::find($id);
      $slider->name = $request->name;
      $slider->description = $request->description;
      if (!empty($request->image)) {
            $image = $request->image;
            $slider->image = $fileName;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(960, 500);
            $image_resize->save(public_path('assets/uploads/sliders/'.$fileName));
      }
      if($slider->save()){
        return redirect(route('admin.dashboard.sliders.index'))->withSuccess('The data has been added');
      }else{
        return back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function deleteSlider($id)
    {
      $slider = Slider::find($id);
      if($slider->delete()){
        return redirect(route('admin.dashboard.sliders.index'))->withSuccess('The data has been deleted');
      }else{
        return back();
      }
    }
}
