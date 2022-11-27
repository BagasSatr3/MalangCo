<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);
        Message::create($input);

        notify()->success('Thanks for your message!');
        return back();
    }
}
