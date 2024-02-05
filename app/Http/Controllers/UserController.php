<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Category;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function category($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $technicians = $category->technicians()->get();
    
        return view('user.category.category', compact('technicians','category'));
    }

    public function showTechnicianDetail($technicianId)
    {
        $technician = Technician::findOrFail($technicianId);

        return view('user.category.detail', compact('technician'));
    }

    public function profile()
    {
        $profile = Auth::user();
        $addresses = Address::where('user_id', $profile->id)->get();
        return view('user.profile.profile', compact('profile', 'addresses'));
    }

    public function profileupdate(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contactno' => 'nullable|numeric',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($validatedData);

        return redirect()->route('profile.user')->with('message', 'Profile updated successfully.');
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'street' => 'required',
            'address_name' => 'required|in:Home,Office', // Make sure it's one of the specified values
            'contact_name' => 'required',
            'contact_number' => 'required',
            'alt_contact_number' => 'nullable', // It's optional, so use nullable rule
        ]);
    
        // using relationship set up in my User model
        auth()->user()->addresses()->create($request->all());
    
        return redirect()->route('profile.user')->with('message', 'Address added successfully.');
    }    

}
