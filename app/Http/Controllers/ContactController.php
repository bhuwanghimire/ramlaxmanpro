<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\Sendmail;


class ContactController extends Controller
{
    public function index(){
        return view('layouts.include.contact');
    }

    public function store(Request $request){

        // $data = request()->validate([
        //     'name' => 'required',
        //     'email'=> 'required|email',
        //     'subject'=> 'required',
        //     'message'=> 'required',
        // ]);

        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required|email',
            'subject'=> 'required',
            'message'=> 'required',
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            
        );

      //send email

       Mail::to('bhuwanghimire100@gmail.com')->send(new Sendmail($data));

     return redirect()->back()->with('success','Your message has been sent. Thank you!');
       
    }
}
