<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register-technician');
    }

    public function register(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'contactnumber' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:technicians,email',
            'skill' => 'required|string',
            'yearsofexperience' => 'nullable|integer',
            'dob' => 'required|date',
            'profilepic' => 'nullable|image',
        ]);

        // Store the technician in the database
        $technician = new Technician();
        $technician->fullname = $validatedData['fullname'];
        $technician->contactnumber = $validatedData['contactnumber'];
        $technician->address = $validatedData['address'];
        $technician->email = $validatedData['email'];
        $technician->skill = $validatedData['skill'];
        $technician->yearsofexperience = $validatedData['yearsofexperience'];
        $technician->dob = $validatedData['dob'];

        // Handle profile picture upload
        if ($request->hasFile('profilepic')) {
            $path = $request->file('profilepic')->store('profile_pictures');
            $technician->profilepic = $path;
        }

        // Save the technician
        $technician->save();

        // Redirect or return response as needed
        return redirect()->back()->with('success', 'Technician registered successfully!');
    }

    public function dashboard()
    {
        return view('technician.dashboard');
    }

}
