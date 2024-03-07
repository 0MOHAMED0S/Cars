<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Testimonials as ModelsTestimonials;
use Illuminate\Http\Request;

class Testimonials extends Controller
{
    
    public function testimonials(){
        $messages = Contact::all();
        $testimonials=ModelsTestimonials::all();
        return view('Admin.Testimonials.All_Testimonials',compact('testimonials','messages'));
    }
    public function  add_testimonials(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|string',
            'name' => 'required|string', 
            'path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
            'path2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjusted for images and made it nullable
        ]);

        $image = $request->file('path'); // Assuming 'path' is the file input
        $imageName = $image->getClientOriginalName(); // You can customize this as needed
        $path = $image->storeAs('MainImages', $imageName, 'public');

        $image2 = $request->file('path2'); // Assuming 'path' is the file input
        $imageName2 = $image2->getClientOriginalName(); // You can customize this as needed
        $path2 = $image2->storeAs('MainImages', $imageName2, 'public');

        $testimonials = new ModelsTestimonials;
        $testimonials->name = $validatedData['name'];
        $testimonials->details = $validatedData['details'];
        $testimonials->path = $path;
        $testimonials->path2 = $path2;
        $testimonials->save();
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function update_testimonials(Request $request, $id)
    {

        $testimonials = ModelsTestimonials::find($id);
    
        $validatedData = $request->validate([
            'details' => 'required|string',
            'name' => 'required|string',
            'path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'path2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('MainImages', $imageName, 'public');
        } else {
            $path = $testimonials->path;
        }
    
        if ($request->hasFile('path2')) {
            $image2 = $request->file('path2');
            $imageName2 = $image2->getClientOriginalName();
            $path2 = $image2->storeAs('MainImages', $imageName2, 'public');
        } else {
            $path2 = $testimonials->path2;
        }
        $testimonials->name =  $validatedData['name'];
        $testimonials->details = $validatedData['details'];
        $testimonials->path = $path;
        $testimonials->path2 = $path2;
        $testimonials->save();
    
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
    

    public function  destroy($id)
    {
        $ietm = ModelsTestimonials::find($id);
        // Check if the product exists
        if (!$ietm) {
            return redirect()->back()->with('error', 'Categorie not found');
        }

        // Proceed with the deletion
        $ietm->delete();
        return redirect()->back()->with('success', 'Data Deleted successfully.');
    }
}
