<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Profile;
use Image;
Use Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $profiles = Profile::all();
        
        // return response()->json($profiles);
        return view('admin.profile.index',compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $logos =  $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$logos->getClientOriginalExtension();
         Image::make($logos)->resize(1920,1088)->save('image/logo/'.$name_gen);
        $last_img = 'image/logo/'.$name_gen;

        
        Profile::insert([
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'fb_link' => $request->fb_link,
            'map_address' => $request->map_address,
            'logo' => $last_img,
            'created_at' => Carbon::now()
        ]);
        toast('  Successfully','success');
        return redirect()->route('profile.index');
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
        $profile = Profile::find($id);
       
       return view('admin.profile.edit',compact('profile'));
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
        
        $profile = Profile::find($id);
        $profiles =  $request->file('logo');
        if ( $profiles) {
            $name_gen = hexdec(uniqid()).'.'.$profiles->getClientOriginalExtension();
            Image::make($profiles)->resize(1920,1088)->save('image/logo/'.$name_gen);
            $last_img = 'image/logo/'.$name_gen;
            $profile->logo =  $last_img;
            $profile->save();
        }

        $profile->address   = $request->address;
        $profile->phone   = $request->phone;
        $profile->email   = $request->email;
        $profile->fb_link   = $request->fb_link;
        $profile->map_address   = $request->map_address;
        $profile->save();
        
        toast('Updated  Successfully','success');
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();
        toast('Deleted Successfully','warning');
        return redirect()->back();
    }
}
