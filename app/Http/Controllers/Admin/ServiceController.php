<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\Service;
Use Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'icon' => 'required',
        ]);
            
        $icons =  $request->file('icon');
        $name_gen = hexdec(uniqid()).'.'.$icons->getClientOriginalExtension();
        Image::make($icons)->resize(1920,1088)->save('image/servicelogo/'.$name_gen);
        $last_img = 'image/servicelogo/'.$name_gen;

        
        
        Service::insert([
            'icon' => $last_img,
            'title' => $request->title,
            'description' => $request->description,
            
            'created_at' => Carbon::now()
        ]);
        toast('Service Inserted Successfully','success');
        return redirect()->route('service.index');
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
        $service = Service::find($id);
        return view('admin.service.edit',compact('service'));
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
        $service = Service::find($id);

        $services =  $request->file('icon');
        if ( $services) {
            $name_gen = hexdec(uniqid()).'.'.$services->getClientOriginalExtension();
            Image::make($services)->resize(1920,1088)->save('image/servicelogo/'.$name_gen);
            unlink($service->icon);
             $last_img = 'image/servicelogo/'.$name_gen;
            $service->icon =  $last_img;
            $service->save();
        }
       
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();
            
    
        toast('Service Updated Successfully','success');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        unlink($service->icon);
        $service->delete();
        toast('Deleted Successfully','warning');
        return redirect()->back();
    }
}
