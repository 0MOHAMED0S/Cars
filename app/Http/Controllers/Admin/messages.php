<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class messages extends Controller
{
    public function messages(){
        $messages = Contact::all();
        return view('Admin.messages.Messages',compact('messages'));
    }
    public function messages_read($id){
        // Find the specific message by ID
        $messages = Contact::all();

        $message = Contact::find($id);

    
        // Check if $messageRead is not null before marking it as read
        if ($message) {
                $message->read = 1;
                $message->save();
        }
    
        // Pass both all messages and the specific one to the view
        return view('Admin.messages.Message', compact('message','messages'));
    }    
}
