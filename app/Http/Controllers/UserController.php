<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Category;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        
        $totalBookings = Booking::where('user_id', $user->id)->count();
        $totalComments = Comment::where('user_id', $user->id)->count();
        $totalAddresses = Address::where('user_id', $user->id)->count();

        // Count technicians by skill (category)
        $technicianCounts = Technician::select('categories.name as skill_name', DB::raw('count(*) as count'))
        ->join('categories', 'technicians.skill_id', '=', 'categories.id')
        ->groupBy('categories.name')
        ->get();
    
        return view('user.home', compact('totalBookings', 'totalComments', 'totalAddresses','technicianCounts'));
    }

    public function category($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $technicians = $category->technicians()
        ->orderByDesc('totaljobs')
        ->get();

        return view('user.category.category', compact('technicians','category'));
    }

    public function showTechnicianDetail($technicianId)
    {
        $technician = Technician::findOrFail($technicianId);
        $profile = Auth::user();
        $addresses = Address::where('user_id', $profile->id)->get();
        $selectedAddressId = $profile->selected_address_id;

        // Retrieve comments for the technician
        $comments = Comment::where('technician_id', $technicianId)->with('user', 'replies')->get();

        return view('user.category.detail', compact('technician','addresses','selectedAddressId','profile','comments'));
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
