<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;

class MailController extends Controller
{
    
    public function getMail()
    {
        $data = ['name' =>'kiren'];
        Mail::to("fijisuarez@gmail.com")->send(new TestMail($data));
    }

}
