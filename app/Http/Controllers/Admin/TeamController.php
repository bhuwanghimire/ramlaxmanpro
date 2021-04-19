<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;
use App\Models\Team;
Use Alert;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     
        $team =  $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$team->getClientOriginalExtension();
         Image::make($team)->resize(1920,1088)->save('image/team/'.$name_gen);
        $last_img = 'image/team/'.$name_gen;

        
        Team::insert([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        toast('  Successfully','success');
        return redirect()->route('team.index');
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
        $team = Team::find($id);
        return view('admin.team.edit',compact('team'));
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
        $team = Team::find($id);
        $teams =  $request->file('image');
        if ( $teams) {
            $name_gen = hexdec(uniqid()).'.'.$teams->getClientOriginalExtension();
            Image::make($teams)->resize(1920,1088)->save('image/team/'.$name_gen);
            $last_img = 'image/team/'.$name_gen;
            $team->image =  $last_img;
            $team->save();
        }
        
       
        $team->name   = $request->name;
        $team->designation   = $request->designation;
     
        
        $team->save();
        toast(' Updated Successfully','success');
 
 
         return redirect()->route('team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        toast(' Deleted Successfully','warning');
        return redirect()->back();
    }
}
