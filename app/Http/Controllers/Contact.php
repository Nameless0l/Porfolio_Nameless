<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact as MailContact;
use Illuminate\Support\Facades\Mail;

class Contact extends Controller
{
    public function index(Request $request){
        // dd($request);

        Mail::to("mbassiloic@bazelsquare.com","Mbassi Ewolo Loic Aron")->send(new MailContact($request->fullname, $request->email, $request->message, "Message depuis le site de votre PortFolio"));
        return back()->with("success", "Message envoyé");
    }
}
