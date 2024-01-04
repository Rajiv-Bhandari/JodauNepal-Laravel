<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Enums\TechnicianStatus;
use Illuminate\Support\Facades\Mail;
use App\Enums\Usertype; 
use Illuminate\Support\Str;
use App\Jobs\EmailQueue;
use App\Jobs\SendApprovalEmail;
use App\Jobs\SendRejectionEmailJob;

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
            // 'profilepic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
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
            $file = $request->file('profilepic');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            
            $file->move(public_path('images/profile_pictures'), $filename);
            $technician->profilepic = $filename;
        }
        // Save the technician
        $technician->save();

        // Redirect or return response as needed
        return redirect()->back()->with('success', 'Technician registered successfully! Wait for Admin approval');
    }

    public function dashboard()
    {
        return view('technician.dashboard');
    }
    public function approve($id)
    {
        $technician = Technician::findOrFail($id);
        $technician->status = TechnicianStatus::Approved;
        $technician->save();
    
        // $generatedPassword = $this->createTechnicianUser($technician);
    
        // SendApprovalEmail::dispatch($technician, $generatedPassword);
        EmailQueue::dispatch($technician->fullname, $technician->email);
    
        return redirect()->back();
    }

    public function reject($id)
    {
        $technician = Technician::findOrFail($id);
        $technician->status = TechnicianStatus::Rejected;
        $technician->rejectmessage = request()->input('rejectmessage');
        $technician->save();

        // Send an email to the approved technician
        Mail::send('emails.rejected', ['technician' => $technician], function ($message) use ($technician) {
            $message->to($technician->email, $technician->fullname)
                    ->subject('Sorry! You have been rejected');
        });
        return redirect()->back();
    }

    private function createTechnicianUser($technician)
    {
        $user = new User();
        $user->name = $technician->fullname;
        $user->email = $technician->email;
        $user->address = $technician->address;
        $user->contactno = $technician->contactnumber;
        $password = Str::random(10); 
        $user->password = bcrypt($password);
        $user->usertype = Usertype::Technician;
        $user->save();

        // Update the technician table with the created user's ID
        $technician->user_id = $user->id;
        $technician->save();

        return $password; 
    }
}
