<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Technician;
use App\Models\TechnicianTimeslot;
use App\Models\KhaltiPayment;
use App\Enums\BookingStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
            'date_time' => now(), 
            'status' => BookingStatus::Pending,
            'problem_statement' => $request->problem_statement,
            'booking_code' => $bookingCode,
        ]);

        // Mark the corresponding TechnicianTimeslot as booked
        $timeslot = TechnicianTimeslot::findOrFail($request->technician_timeslot_id);
        $timeslot->update(['isBooked' => true]);

        return redirect()->route('user.bookingsuccessful', ['bookingCode' => $bookingCode])->with('success', 'Booking successful!');
    }

    public function index()
    {
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->get();
        
        return view('user.booking.index', compact('bookings'));
    }

    public function khaltiVerified()
    {
        Alert::toast("Payment Successful", 'success');

        return redirect()->back(); 
    }

    public function userPayment()
    {
        $userId = Auth::id();
        $payment = KhaltiPayment::where('paid_by', $userId)->get();
    
        return view('user.payment.index', compact('payment'));
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
        $timeslot = TechnicianTimeslot::findOrFail($booking->technician_timeslot_id);

        $booking->update(['status' => \App\Enums\BookingStatus::Cancelled]);
        $timeslot->update(['isBooked' => false]);

        return redirect()->back();
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
    public function bookingindex(Request $request)
    {
        // Retrieve the authenticated technician
        $technician = Technician::where('user_id', Auth::id())->first();
        $technicianId = $technician->id;
        $status = $request->input('status');
    
        $query = Booking::where('technician_id', $technician->id)->with('user');
    
        if ($status === 'pending') {
            $query->where('status', BookingStatus::Pending);
        } elseif ($status === 'completed') {
            $query->where('status', BookingStatus::Completed);
        } elseif ($status === 'cancelled') {
            $query->where('status', BookingStatus::Cancelled);
        } elseif ($status === 'confirmed') {
            $query->where('status', BookingStatus::Confirmed);
        }
    
        $bookings = $query->get();
        $notifications = $this->getNotifications($technicianId);

        return view('technician.booking.index', compact('bookings','notifications'));
    }
    
    
    public function technicianbookingdetails($id)
    {
        $technician = Technician::where('user_id', Auth::id())->first();
        $technicianId = $technician->id;
        $booking = Booking::findOrFail($id);
        $notifications = $this->getNotifications($technicianId);
        return view('technician.booking.details', compact('booking','notifications'));
    }

    public function cancelBookingTechnician($id)
    {
        $booking = Booking::findOrFail($id);
        $timeslot = TechnicianTimeslot::findOrFail($booking->technician_timeslot_id);

        $booking->update(['status' => \App\Enums\BookingStatus::Cancelled]);
        $timeslot->update(['isBooked' => false]);

        return redirect()->back();
    }

    public function confirmBookingTechnician($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => \App\Enums\BookingStatus::Confirmed]);

        return redirect()->back();
    }

    public function completeBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $totalCost = request('totalamount');
        $booking->update([
            'status' => \App\Enums\BookingStatus::Completed,
            'total_cost' => $totalCost,
        ]);
        $booking->technician->increment('totaljobs');
        
        return redirect()->back();
    }

    public function rateTechnician($id)
    {
        $booking = Booking::findOrFail($id);

        request()->validate([
            'rating' => 'required|integer|between:1,5',
        ]);

        $rating = request('rating');
        $booking->update(['rating' => $rating]);

        return redirect()->back();
    }

}

