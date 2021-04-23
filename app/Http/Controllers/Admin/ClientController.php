<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Client;
Use Alert;
use Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
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
           
            'logo' => 'required',
        ]);
          
        $client_logo =  $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$client_logo->getClientOriginalExtension();
         Image::make($client_logo)->resize(1920,1088)->save('image/clientlogo/'.$name_gen);
        $last_img = 'image/clientlogo/'.$name_gen;

        
        Client::insert([
            'client_logo' => $last_img,
            'client_link' => $request->client_link,
            'created_at' => Carbon::now()

        ]);
        toast(' Inserted Successfully','success');
        return redirect()->route('client.index');
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
        $client = Client::find($id);
        return view('admin.client.edit',compact('client'));
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
        $client = Client::find($id);
        $client_image =  $request->file('logo');
        if ( $client_image) {
            $name_gen = hexdec(uniqid()).'.'.$client_image->getClientOriginalExtension();
            Image::make($client_image)->resize(1920,1088)->save('image/clientlogo/'.$name_gen);
            unlink($client->client_logo);
            $last_img = 'image/clientlogo/'.$name_gen;
            $client->client_logo =  $last_img;
            $client->save();
        }
        
        $client->client_link   = $request->client_link;
     
        
       $client->save();
       toast(' Updated Successfully','success');


        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        unlink($client->client_logo);
        $client->delete();
        toast('Deleted Successfully','warning');
        return redirect()->back();
    }
}
