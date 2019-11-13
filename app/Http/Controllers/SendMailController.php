<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SenMail;

class SendMailController extends Controller
{
    //
    function index()
    {
        return view('contact');
    }

    function send(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'email' =>'required|email',
            'phone'=>'required',
            'message'=>'required',
        ]);
        $data =  array(
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'message'=>$request->message,

        );
        Mail::to('kompassproject@gmail.com')->send(new SenMail($data));
        return back()->with('success','Thanks for contacting us!');
    }
}
