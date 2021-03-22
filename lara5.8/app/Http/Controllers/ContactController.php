<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller {

    public function create() {
        return view('contact.contact');
    }

    public function store() {
        $data = request()->validate([
            "name" => "required|min:3",
            "email" => "required|email",
            "message" => "required"
        ]);

        Mail::to('example@example.com')->send(new ContactMail($data));
        
    //  mail('test@test.com', $data['name'], $data['message'],'', $data['email']);


    }
   
}
