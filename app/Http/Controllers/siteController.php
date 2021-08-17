<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class siteController extends Controller
{
    //


    public function contact(Request $request){
        $request->validate([
            "name" => 'required',
            "email" => 'required|email',
            "subject" => 'required',
            "message" => 'required',
        ]);
        Mail::send('emails.contact', ['data' => $request], function ($m) use ($request) {
            $m->from('hello@app.com', 'Your Application');
            $m->to($request->email, $request->name)->subject($request->subject);
        });
        return true;
    }
}
