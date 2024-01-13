<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Enums\TechnicianStatus;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $status = $request->input('status'); // Get the status parameter from the request
    
        $query = Technician::query();
    
        // Filter technicians based on the status parameter
        if ($status === 'requested') {
            $query->where('status', TechnicianStatus::Pending);
        } elseif ($status === 'approved') {
            $query->where('status', TechnicianStatus::Approved);
        } elseif ($status === 'rejected') {
            $query->where('status', TechnicianStatus::Rejected);
        } else {
            $technicians = Technician::all();
        }
        
        $query->orderBy('created_at', 'desc');
        $technicians = $query->get();
    
        return view('admin.dashboard', compact('technicians'));
    }

    public function category()
    {
        Alert::toast('Category page!', 'success')->position('bottom-right');
        return view('admin.category');
        
    }
}






