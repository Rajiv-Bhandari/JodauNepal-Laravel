<?php

// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Enums\BookingStatus;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'technician_id' => 'required|exists:technicians,id',
            'address_id' => 'required|exists:addresses,id',
            'technician_timeslot_id' => 'required|exists:techniciantimeslots,id', // Adjusted table name
            'problem_statement' => 'required|string',
        ], [   
            'address_id.required' => 'Please select an address or if dont have create a new one.',
            'technician_timeslot_id.required' => 'Please select both Day and Time.',
    
        ]);
        // Create a new booking
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'technician_id' => $request->technician_id,
            'address_id' => $request->address_id,
            'technician_timeslot_id' => $request->technician_timeslot_id,
            'date_time' => now(), // You may adjust this based on your requirements
            'status' => BookingStatus::Pending,
            'problem_statement' => $request->problem_statement,
        ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }
}
