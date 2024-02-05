<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Category;
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
        return view('user.profile.profile', compact('profile'));
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

}
