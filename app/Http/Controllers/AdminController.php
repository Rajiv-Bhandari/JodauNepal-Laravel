<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;

class AdminController extends Controller
{
    public function dashboard()
    {
        $technicians = Technician::all();
        return view('admin.dashboard', compact('technicians'));
    }
}
