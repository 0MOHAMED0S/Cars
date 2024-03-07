<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cars;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class main extends Controller
{
    public function index(){
        $cars = Cars::latest()->take(10)->get();
        $testimonials=Testimonials::all();
        return view('User.index', compact('cars','testimonials'));
    }
    public function cars(Request $request){
        $categories = Categories::all();
        $selectedCategoryId = $request->input('categorie_id');
        // Check if a category is selected
        if($selectedCategoryId == 'all'){
            // Display all cars
            $cars = Cars::all();
        }
        elseif (!empty($selectedCategoryId)) {
            // Filter cars based on the selected category
            $cars = Cars::where('categorie_id', $selectedCategoryId)->get();
        }
        else {
            // No category selected, display all cars
            $cars = Cars::all();
        }
    
        return view('User.Cars', compact('categories', 'cars', 'selectedCategoryId'));
    }

    public function cars_details($id)
    {
        $car = Cars::find($id);
        return view('User.Cars_Details', compact('car'));
    }

    
    public function contactus(){
        return view('User.Contact_Us');
    }
    public function  store_contactus(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            ]);
        $contact = new Contact;
        $contact->name = $validatedData['name'];
        $contact->message = $validatedData['message'];
        $contact->email = $validatedData['email'];
        $contact->save();
        return redirect()->back()->with('success', 'Email Sended successfully');
    }
}
