<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cars as ModelsCars;
use App\Models\Categories;
use App\Models\Contact;
use Illuminate\Http\Request;

class Cars extends Controller
{
    public function cars(Request $request){
        $messages = Contact::all();
        $categories = Categories::all();
        $selectedCategoryId = $request->input('categorie_id');
        // Check if a category is selected
        if($selectedCategoryId == 'all'){
            // Display all cars
            $cars = ModelsCars::all();
        }
        elseif (!empty($selectedCategoryId)) {
            // Filter cars based on the selected category
            $cars = ModelsCars::where('categorie_id', $selectedCategoryId)->get();
        }
        else {
            // No category selected, display all cars
            $cars = ModelsCars::all();
        }
    
        return view('Admin.Cars.All_Cars', compact('categories', 'cars', 'selectedCategoryId','messages'));
    }
    
    

    public function  store_cars(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|string',
            'categorie_id' => 'required|exists:categories,id', // Check if the selected section_id exists in the sections table
            'name' => 'required|string', 
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
            'price' => 'required|integer',
            'passengers' => 'required|integer',
            'doors' => 'required|integer',
        ]);

        $image = $request->file('path'); // Assuming 'path' is the file input
        $imageName = $image->getClientOriginalName(); // You can customize this as needed
        $path = $image->storeAs('MainImages', $imageName, 'public');
        $Cars = new ModelsCars;
        $Cars->name = $validatedData['name'];
        $Cars->details = $validatedData['details'];
        $Cars->price = $validatedData['price'];
        $Cars->passengers = $validatedData['passengers'];
        $Cars->doors = $validatedData['doors'];
        $Cars->categorie_id = $validatedData['categorie_id'];
        $Cars->path = $path;
        $Cars->save();
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function update_cars(Request $request, $id)
    {
        $Cars = ModelsCars::find($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string',
            'details' => 'required|string',
            'path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images
            'categorie_id' => 'required|exists:categories,id', // Check if the selected section_id exists in the sections table
            'price' => 'required|integer',
            'passengers' => 'required|integer',
            'doors' => 'required|integer',
        ]);
        
    
        if ($request->file('path')) {
            $image = $request->file('path');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $path = $Cars->path;
        }
    
        $Cars->name = $validatedData['name'];
        $Cars->details = $validatedData['details'];
        $Cars->price = $validatedData['price'];
        $Cars->passengers = $validatedData['passengers'];
        $Cars->doors = $validatedData['doors'];
        $Cars->categorie_id = $validatedData['categorie_id'];
        $Cars->path = $path;
        $Cars->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
    public function  destroy($id)
    {
        $ietm = ModelsCars::find($id);
        // Check if the product exists
        if (!$ietm) {
            return redirect()->back()->with('error', 'Car not found');
        }
        // Proceed with the deletion
        $ietm->delete();
        return redirect()->back()->with('success', 'CAR Deleted successfully');
    }

}
