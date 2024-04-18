<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\User;
use App\Models\Category;
use App\Models\Booking;
use App\Models\TechnicianTimeSlot;
use App\Models\KhaltiPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Enums\TechnicianStatus;
use Illuminate\Support\Facades\Mail;
use App\Enums\Usertype; 
use App\Enums\BookingStatus;
use Illuminate\Support\Str;
use App\Jobs\EmailQueue;
use App\Jobs\RejectedQueue;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TechnicianController extends Controller
{
    public function showRegistrationForm()
    {
        $skills = Category::where('status', 0)->pluck('name', 'id');
        return view('register-technician', compact('skills'));
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

    private function getNotifications($technicianId)
    {
        return DB::table('bookings')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('techniciantimeslots', 'bookings.technician_timeslot_id', '=', 'techniciantimeslots.id')
            ->where('bookings.technician_id', $technicianId)
            ->select('users.name as userName', 'bookings.date_time', 'techniciantimeslots.date', 'techniciantimeslots.start_time', 'techniciantimeslots.end_time')
            ->orderBy('bookings.date_time', 'desc')
            ->take(5)
            ->get();
    }

    public function dashboard()
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
        $technicianId = $technician->id;
    
        // Count of bookings with different statuses
        $pendingCount = Booking::where('technician_id', $technicianId)->where('status', BookingStatus::Pending)->count();
        $cancelledCount = Booking::where('technician_id', $technicianId)->where('status', BookingStatus::Cancelled)->count();
        $confirmedCount = Booking::where('technician_id', $technicianId)->where('status', BookingStatus::Confirmed)->count();
        $completedCount = Booking::where('technician_id', $technicianId)->where('status', BookingStatus::Completed)->count();
    
        // Get booking notifications for the technician
        $notifications = $this->getNotifications($technicianId);
    
        return view('technician.dashboard', compact('pendingCount', 'cancelledCount', 'confirmedCount', 'completedCount', 'notifications'));
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
    
        $timeslot = TechnicianTimeSlot::where('technician_id', $technicianId)->orderBy('date')->get();
        $notifications = $this->getNotifications($technicianId);

        return view('technician.timeslot.index', compact('timeslot','notifications'));
    }

    public function technicianPayment()
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
    
        $technicianId = $technician->id;
    
        $payment = KhaltiPayment::where('paid_to', $technicianId)->get();
        $notifications = $this->getNotifications($technicianId);

        return view('technician.payment.index', compact('notifications','payment'));
    }

    public function timeslotcreate()
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
        $technicianId = $technician->id;
        $notifications = $this->getNotifications($technicianId);

        return view('technician.timeslot.create',compact('notifications'));
    }

    public function timeslotstore(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:Y-m-d|after_or_equal:' . now()->toDateString(),
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
    
        // Check if the technician already has a timeslot for the selected date and time
        $existingSlot = TechnicianTimeSlot::where('technician_id', $technicianId)
            ->where('date', $request->date)
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
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);
    
        Alert::toast('Timeslot added successfully', 'success');
    
        return redirect()->route('timeslot.technician');
    }
      

    public function timeslotedit($id)
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
        $technicianId = $technician->id;

        $timeslot = TechnicianTimeSlot::findOrFail($id);
        $notifications = $this->getNotifications($technicianId);

        return view('technician.timeslot.edit', compact('timeslot','notifications'));
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
    
        // Check if the technician already has a timeslot for the selected date and time
        $existingSlot = TechnicianTimeSlot::where('technician_id', $technicianId)
            ->where('date', $request->date)
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
        $timeslot->update(array_filter($request->only(['date', 'start_time', 'end_time'])));
        Alert::toast('Timeslot updated successfully', 'success');
    
        return redirect()->route('timeslot.technician');
    }
    
    public function timeslotdestroy($id)
    {
        $timeslot = TechnicianTimeSlot::findOrFail($id);
        $timeslot->delete();

        Alert::toast('Timeslot deleted successfully', 'success');

        return redirect()->route('timeslot.technician');
    }

    public function technicianProfile()
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
        $technicianId = $technician->id;

        $notifications = $this->getNotifications($technicianId);
        return view("technician.profile.index", compact('notifications','technician'));
    }

    public function technicianProfileUpdate(Request $request)
    {
        $userId = Auth::id();
        $technician = Technician::where('user_id', $userId)->first();
       
        $request->validate([
            'name' => 'required|string',
            'contactno' => 'required|string',
            'address' => 'required|string',
        ]);
       
        // Update the technician's name, contact number, and address
        $technician->fullname = $request->input('name');
        $technician->contactnumber = $request->input('contactno');
        $technician->address = $request->input('address');
        $technician->save();

        Alert::toast('Profile updated successfully', 'success');
        return redirect()->back();
    }

}
