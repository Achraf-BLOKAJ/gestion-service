<?php

namespace App\Http\Controllers;

use App\Mail\TechnicienMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $request){
        Mail::to('hzayna17@gmail.com')->send(new TechnicienMail());
        return view ('home',compact('compteur'));
    }
}
