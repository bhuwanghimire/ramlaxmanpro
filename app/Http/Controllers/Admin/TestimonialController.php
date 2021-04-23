<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\Testimonial;
Use Alert;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $testimonial =  $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$testimonial->getClientOriginalExtension();
         Image::make($testimonial)->resize(1920,1088)->save('image/testimonial/'.$name_gen);
        $last_img = 'image/testimonial/'.$name_gen;

        
        Testimonial::insert([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        toast('  Successfully','success');
        return redirect()->route('testimonial.index');
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonials.edit',compact('testimonial'));
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
        $find_id = Testimonial::find($id);
        $testimonial =  $request->file('image');
        if ( $testimonial) {
            $name_gen = hexdec(uniqid()).'.'.$testimonial->getClientOriginalExtension();
            Image::make($testimonial)->resize(1920,1088)->save('image/testimonial/'.$name_gen);
            unlink($find_id->image);
            $last_img = 'image/testimonial/'.$name_gen;
            $find_id->image =  $last_img;
            $find_id->save();
        }
        
        $find_id->name = $request->name;
        $find_id->designation = $request->designation ;
        $find_id->description = $request->description ;
        
       $find_id->save();
       toast(' Updated Successfully','success');


        return redirect()->route('testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        unlink($testimonial->image);
        $testimonial->delete();
        toast(' Deleted Successfully','warning');
        return redirect()->back();
    }
}
