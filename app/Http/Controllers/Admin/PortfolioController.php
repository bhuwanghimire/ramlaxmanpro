<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Portfolio;
use App\Models\Category;
use Image;
Use Alert;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index',compact('portfolios','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $categories = Category::all();
        return view('admin.portfolio.create',compact('categories'));
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
            'categoryid' => 'required',
            'image' => 'required',
        ]);

        $image =  $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(1920,1088)->save('image/portfolio/'.$name_gen);
        $last_img = 'image/portfolio/'.$name_gen;

        
        Portfolio::insert([
            'category_id' => $request->categoryid,
            'project_name' => $request->project_name,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'date' => $request->date,
            'link' => $request->link,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        toast(' Inserted Successfully','success');
        return redirect()->route('portfolio.index');
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
        $portfolio = Portfolio::find($id);
         $categories = Category::all();
        return view('admin.portfolio.edit',compact('portfolio','categories'));
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
        $portfolios = Portfolio::find($id);
        $portfolio =  $request->file('image');
        if ( $portfolio) {
            $name_gen = hexdec(uniqid()).'.'.$portfolio->getClientOriginalExtension();
            Image::make($portfolio)->resize(1920,1088)->save('image/portfolio/'.$name_gen);
            unlink($portfolios->image);
            $last_img = 'image/portfolio/'.$name_gen;
            $portfolios->image =  $last_img;
            $portfolios->save();
        }
        
        $portfolios->category_id = $request->category_id;
        $portfolios->project_name = $request->project_name;
        $portfolios->description = $request->description;
        $portfolios->company_name = $request->company_name;
        $portfolios->date = $request->date;
        $portfolios->link = $request->link;
        
       $portfolios->save();
       toast(' Updated Successfully','success');


        return redirect()->route('portfolio.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        unlink($portfolio->image);
        $portfolio->delete();
        toast('Deleted Successfully','warning');
        return redirect()->back();
    }
}
