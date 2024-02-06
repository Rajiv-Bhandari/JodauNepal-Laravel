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
        $profile = Auth::user();
        $addresses = Address::where('user_id', $profile->id)->get();
        $selectedAddressId = $profile->selected_address_id;

        return view('user.category.detail', compact('technician','addresses','selectedAddressId'));
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
            'address_name' => 'required|in:Home,Office', // Making sure it's one of the specified values
            'contact_name' => 'required',
            'contact_number' => 'required',
            'alt_contact_number' => 'nullable', // It's optional, so used nullable rule
        ]);
    
        // using relationship set up in my User model
        auth()->user()->addresses()->create($request->all());
    
        return redirect()->back()->with('success', 'Address added successfully.');
    }    
    public function deleteAddress($id)
    {
        $address = Address::find($id);
        $address->delete();
        // Redirect back or to a specific page after deletion
        return redirect()->back()->with('success', 'Address deleted successfully');
    }


}
