<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\BookingStatus;
use App\Models\Technician;
use App\Models\User;

class ReportController extends Controller
{
    public function filterbooking()
    {
        $technicians = User::where('usertype', 1)->get();

        return view('report.filter-booking', compact('technicians'));
    }
}
