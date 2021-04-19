<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index(){
        return view('layouts.include.contact');
    }

    public function store(Request $request){

        $data = request()->validate([
            'name' => 'required',
            'email'=> 'required|email',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

      //send email

      Mail::to('bhuwanghimire100@gmail.com')->send(new ContactFormMail($data));

      return redirect()->back()->with('success','Your message has been sent. Thank you!');
       
    }
}
