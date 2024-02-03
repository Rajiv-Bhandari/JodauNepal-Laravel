<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\User;
use App\Models\Category;
use App\Models\TechnicianTimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Enums\TechnicianStatus;
use Illuminate\Support\Facades\Mail;
use App\Enums\Usertype; 
use Illuminate\Support\Str;
use App\Jobs\EmailQueue;
use App\Jobs\RejectedQueue;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class TechnicianController extends Controller
{
    public function showRegistrationForm()
    {
        $skills = Category::pluck('name', 'id');
        return view('register-technician',compact('skills'));
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
        $technician->skill_id = $validatedData['skill'];
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
    
        $generatedPassword = $this->createTechnicianUser($technician);
      
        EmailQueue::dispatch($technician->fullname, $technician->email, $generatedPassword, $technician->skill_id);
        
        $message = $technician->fullname . ' Approved Successfully';
        Alert::toast($message, 'success');

        return redirect()->back();
    }

    public function reject($id)
    {
        $technician = Technician::findOrFail($id);
        $technician->status = TechnicianStatus::Rejected;
        $technician->rejectmessage = request()->input('rejectmessage');
        $technician->save();

        // Send an email to the approved technician
        RejectedQueue::dispatch($technician->fullname, $technician->email,$technician->rejectmessage, $technician->skill_id);
      
        $message = $technician->fullname . ' Rejected Successfully';
        Alert::toast($message, 'error');

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
    
    public function timeslotindex()
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
    
        $technicianId = $technician->id;
    
        $timeslot = TechnicianTimeSlot::where('technician_id', $technicianId)->orderBy('day')->get();
    
        return view('technician.timeslot.index', compact('timeslot'));
    }
     

    public function timeslotcreate()
    {
        return view('technician.timeslot.create');
    }

    public function timeslotstore(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);
    
        $userId = Auth::id();
        // Get the technician id for the current user
        $technician = Technician::where('user_id', $userId)->first();
    
        if (!$technician) {
            // Handle the case where the technician is not found for the current user
            return redirect()->back()->withErrors(['user_id' => 'Technician not found for the current user.']);
        }
    
        $technicianId = $technician->id;
    
        // Check if the technician already has a timeslot for the selected day and time
        $existingSlot = TechnicianTimeSlot::where('technician_id', $technicianId)
            ->where('day', $request->day)
            ->where(function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('start_time', '>=', $request->start_time)
                        ->where('start_time', '<', $request->end_time);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('end_time', '>', $request->start_time)
                        ->where('end_time', '<=', $request->end_time);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('start_time', '<', $request->start_time)
                        ->where('end_time', '>', $request->end_time);
                });
            })
            ->exists();

    
        if ($existingSlot) {
            return redirect()->back()->withErrors(['start_time' => 'The selected timeslot conflicts with an existing one.']);
        }
    
        // Create the new timeslot
        TechnicianTimeSlot::create([
            'technician_id' => $technicianId,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    
        Alert::toast('Timeslot added successfully', 'success');

        return redirect()->route('timeslot.technician');
    }    

    public function timeslotedit($id)
    {
        $timeslot = TechnicianTimeSlot::findOrFail($id);
        
        return view('technician.timeslot.edit', compact('timeslot'));
    }


    public function timeslotupdate(Request $request, $id)
    {
        $userId = Auth::id();
        // Get the technician id for the current user
        $technician = Technician::where('user_id', $userId)->first();
    
        if (!$technician) {
            // Handle the case where the technician is not found for the current user
            return redirect()->back()->withErrors(['user_id' => 'Technician not found for the current user.']);
        }
    
        $technicianId = $technician->id;
    
        // Check if the technician already has a timeslot for the selected day and time
        $existingSlot = TechnicianTimeSlot::where('technician_id', $technicianId)
            ->where('day', $request->day)
            ->where(function ($query) use ($request, $id) {
                $query->where(function ($q) use ($request) {
                    $q->where('start_time', '>=', $request->start_time)
                        ->where('start_time', '<', $request->end_time);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('end_time', '>', $request->start_time)
                        ->where('end_time', '<=', $request->end_time);
                })
                ->orWhere(function ($q) use ($request) {
                    $q->where('start_time', '<', $request->start_time)
                        ->where('end_time', '>', $request->end_time);
                });
            })
            ->where('id', '!=', $id) // Exclude the current timeslot from the check during update
            ->exists();
    
        if ($existingSlot) {
            return redirect()->back()->withErrors(['start_time' => 'The selected timeslot conflicts with an existing one.']);
        }
    
        // Update only the fields that are present in the request
        $timeslot = TechnicianTimeSlot::findOrFail($id);
        $timeslot->update(array_filter($request->only(['day', 'start_time', 'end_time'])));
        Alert::toast('Timeslot updated successfully', 'success');

        return redirect()->route('timeslot.technician');

    }
    
    
    
    
    
}
