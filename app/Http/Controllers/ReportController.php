<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\BookingStatus;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function filterbooking()
    {
        $technicians = Technician::where('status',1)->get();
    
        return view('report.filter-booking', compact('technicians'));
    }    

    public function filteredBookings(Request $request)
    {
        $selectedStatus = $request->input('booking_status');
        $selectedTechnician = $request->input('technician');
        $selectedTechnicianName = $selectedTechnician ? Technician::find($selectedTechnician)->fullname : 'All';

        $query = DB::table('bookings')
            ->leftJoin('users', 'bookings.user_id', '=', 'users.id')
            ->join('technicians', 'bookings.technician_id', '=', 'technicians.id')
            ->join('techniciantimeslots', 'bookings.technician_timeslot_id', '=', 'techniciantimeslots.id');
    
        if ($request->filled('booking_status')) {
            $statusEnum = $request->input('booking_status');
            $query->where('bookings.status', $statusEnum);
        }
            
        if ($request->filled('technician')) {
            $query->where('bookings.technician_id', $request->input('technician'));
        }
    
        if ($request->filled('from_date')) {
            $query->where('bookings.date_time', '>=', $request->input('from_date'));
        }
    
        if ($request->filled('to_date')) {
            $query->where('bookings.date_time', '<=', $request->input('to_date'));
        }
    
        $bookings = $query->select(
            'bookings.booking_code',
            'bookings.status',
            'bookings.total_cost',
            'bookings.problem_statement',
            'users.name as userName',
            'bookings.date_time',
            'techniciantimeslots.date',
            'techniciantimeslots.start_time',
            'techniciantimeslots.end_time',
            'bookings.user_id',
            'bookings.technician_id',
            'technicians.fullname as technicianName'
        )
            ->orderBy('bookings.date_time', 'desc')
            ->get();
    
        return view('report.bookingsreport', compact('bookings','selectedStatus','selectedTechnicianName','selectedTechnician'));
    }
    
}
