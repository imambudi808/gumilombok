<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscribeEmail;

class EmailController extends Controller
{
    public function showForm(){
        return view('subscribe');
    }

    public function sub(Request $req){
        $data=$this->validate($req,[
            'email' => 'required|email'
        ]);

        Mail::to($req->email)->send(new SubscribeEmail);

        return redirect()->back()->with('pesan','terimaksi');
    }
}
