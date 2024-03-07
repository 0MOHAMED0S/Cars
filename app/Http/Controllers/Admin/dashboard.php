<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Testimonials;
use App\Models\User;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index(){
        $messages = Contact::all();
        $categories = Categories::all();
        $cars = Cars::all();
        $testimonials=Testimonials::all();
        $users=User::all();
        return view('Admin.dashboard',compact('messages','cars','categories','testimonials','users'));
    }
}
