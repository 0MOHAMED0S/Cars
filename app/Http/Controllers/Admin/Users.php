<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function users(){
        $messages = Contact::all();
        $users=User::all();
        return view('Admin.Users.All_Users',compact('users','messages'));
    }
    public function add_users(request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('success', 'Data stored successfully');
    }

    public function update_users(Request $request, $id)
{
    // Find the user
    $user = User::find($id);

    // Check if the user exists
    if (!$user) {
        return redirect()->back()->with('error', 'User not found');
    }

    // Validate the request data
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $id],
        'email_verified_at' => ['nullable', 'date'],
    ]);

    // Update user information
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->email_verified_at = $validatedData['email_verified_at'];
    $user->save();

    return redirect()->back()->with('success', 'Data Updated Successfully');
}

public function  destroy_users($id)
    {
        $ietm = User::find($id);
        // Check if the product exists
        if (!$ietm) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Proceed with the deletion
        $ietm->delete();
        return redirect()->back()->with('success', 'User Deleted successfully.');
    }

}
