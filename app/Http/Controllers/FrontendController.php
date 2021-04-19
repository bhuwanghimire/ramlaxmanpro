<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutus;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Client;


class FrontendController extends Controller
{
    public function index(){

        $aboutus = Aboutus::all();
        $service = Service::all();
        $portfolio = Portfolio::all();
        $client = Client::all();
        return view('welcome')
        ->with('aboutus', $aboutus)
        ->with('services', $service)
        ->with('portfolios', $portfolio)
        ->with('clients', $client);
    }

    public function portfolio_details($id){
         $portfolio = Portfolio::find($id);

        return view('layouts.include.portfolio_details')
        
        ->with('portfolio', $portfolio);
    }
}
