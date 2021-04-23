<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\Slider;
Use Alert;



class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slider_image' => 'required',
        ]);

        $slider_image =  $request->file('slider_image');
        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
         Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;

        
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        
        return redirect()->route('slider.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
         $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider_image =  $request->file('slider_image');
        if ( $slider_image) {
            $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);
            unlink($slider->slider_image);
            $last_img = 'image/slider/'.$name_gen;
            $slider->slider_image =  $last_img;
            $slider->save();
        }
        
        $slider->title = $request->title;
        $slider->description = $request->description ;
        
       $slider->save();
       toast('Slider Updated Successfully','success');


        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $slider = Slider::find($id);
        unlink($slider->slider_image);
        $slider->delete();
        toast('Slider Deleted Successfully','warning');
        return redirect()->back();
    }
}
