<?php

// app/Http/Controllers/BookingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Technician;
use App\Enums\BookingStatus;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    private function generateBookingCode()
    {
        $latestBookingCode = Booking::latest('id')->first();

        if ($latestBookingCode) {
            $lastCode = $latestBookingCode->booking_code;
            $parts = explode('-', $lastCode);
            $lastNumber = (int)end($parts);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
            $newCode = $parts[0] . '-' . $newNumber;
        } else {
            $newCode = 'BO-001'; // Initial code if no previous records exist
        }

        return $newCode;
    }

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

        // Generating a booking code
        $bookingCode = $this->generateBookingCode();

        // Create a new booking
        $booking = Booking::create([
            'user_id' => $request->user_id,
            'technician_id' => $request->technician_id,
            'address_id' => $request->address_id,
            'technician_timeslot_id' => $request->technician_timeslot_id,
            'date_time' => now(), // You may adjust this based on your requirements
            'status' => BookingStatus::Pending,
            'problem_statement' => $request->problem_statement,
            'booking_code' => $bookingCode,
        ]);

        return redirect()->route('user.bookingsuccessful', ['bookingCode' => $bookingCode])->with('success', 'Booking successful!');
    }

    public function index()
    {
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->get();
    
        return view('user.booking.index', compact('bookings'));
    }

    public function details($id)
    {
        $booking = Booking::findOrFail($id);

        return view('user.booking.details', compact('booking'));
    }

    public function bookingsuccessful($bookingCode)
    {
        $booking = Booking::where('booking_code', $bookingCode)->firstOrFail();

        return view('user.booking.bookingsuccessful', compact('booking'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => \App\Enums\BookingStatus::Cancelled]);

        return redirect()->back();
    }

    public function bookingindex()
    {
        // Retrieve the authenticated technician
        $technician = Technician::where('user_id', Auth::id())->first();
    
        if ($technician) {
            // Get the bookings related to the technician along with user information
            $bookings = Booking::where('technician_id', $technician->id)->with('user')->get();
    
            return view('technician.booking.index', compact('bookings'));
        } else {
            // Handle the case where the technician is not found, for example, redirect to a different page
            return redirect()->route('technician.dashboard')->with('error', 'Technician not found.');
        }
    }
    
    public function technicianbookingdetails($id)
    {
        $booking = Booking::findOrFail($id);

        return view('technician.booking.details', compact('booking'));
    }

    public function cancelBookingTechnician($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => \App\Enums\BookingStatus::Cancelled]);

        return redirect()->back();
    }

}

