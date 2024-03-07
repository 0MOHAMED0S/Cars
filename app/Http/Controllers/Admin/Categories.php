<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories as ModelsCategories;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Cars;
use Illuminate\Http\RedirectResponse;

class Categories extends Controller
{
    public function categories(){
        $messages = Contact::all();
        $categories=ModelsCategories::all();
        return view('Admin.Categories.all_categories',compact('categories','messages'));
    }

    public function store_categories(request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $section = new ModelsCategories;
        $section->name = $validatedData['name'];
        $section->save();
        return redirect()->back()->with('success', 'Data stored successfully');
    }
    public function update_categories(Request $request ,$id)
    {
        $Categories =  ModelsCategories::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);
        $Categories->name = $validatedData['name'];
        $Categories->save();
        return redirect()->back()->with('success', 'Data Updated Successfully');
    }
    public function destroy_categorie($id): RedirectResponse
    {
        // Find the category by ID
        $category = ModelsCategories::find($id);
    
        // Check if the category exists
        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
    
        // Check if there are any cars associated with the category
        if ($category->car()->exists()) {
            return redirect()->back()->with('error', 'Cannot delete category with associated cars.');
        }
    
        // Proceed with the deletion if no cars are associated
        $category->delete();
    
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}
