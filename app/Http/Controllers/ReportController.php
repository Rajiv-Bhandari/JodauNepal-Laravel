<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function filterbooking()
    {
        return view('report.filter-booking');
    }
}
