<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Booking;
use App\Models\Category;
use App\Models\User;
use App\Models\KhaltiPayment;
use App\Enums\TechnicianStatus;
use App\Enums\BookingStatus;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function welcome()
    {
        // $categories = Category::all();
        return view('welcome');
    }
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
        return view('admin.category');
    }

    public function userindex()
    {   
        $users = User::where('usertype', 0)->get();
        return view('admin.user.index', compact('users'));
    }

    public function home()
    {
        $category = Category::count();
        $users = User::where('usertype', 0)->count();
        $pending = Technician::where('status', TechnicianStatus::Pending)->count();
        $approved = Technician::where('status', TechnicianStatus::Approved)->count();
        $rejected = Technician::where('status', TechnicianStatus::Rejected)->count();
        $totalbooking = Booking::where('status', BookingStatus::Completed)->count();

        // Pie chart data
        $pieChartData = [
            'Pending' => Booking::where('status', BookingStatus::Pending)->count(),
            'Cancelled' => Booking::where('status', BookingStatus::Cancelled)->count(),
            'Confirmed' => Booking::where('status', BookingStatus::Confirmed)->count(),
            'Completed' => Booking::where('status', BookingStatus::Completed)->count(),
        ];

        // Bar chart data for total users in the last five weeks
        $totalUsersLastFiveWeeks = [];
        $labels = [];
        for ($i = 4; $i >= 0; $i--) {
            $startOfWeek = Carbon::now()->subWeeks($i)->startOfWeek();
            $endOfWeek = Carbon::now()->subWeeks($i)->endOfWeek();
            
            $totalUsersLastFiveWeeks[] = User::where('usertype', 0)
                ->whereDate('created_at', '>=', $startOfWeek)
                ->whereDate('created_at', '<=', $endOfWeek)
                ->count();
        
            $labels[] = $startOfWeek->format('M d') . ' - ' . $endOfWeek->format('M d');
        }

        return view('admin.home', compact('category', 'users','pending','approved','rejected','totalbooking','pieChartData', 'totalUsersLastFiveWeeks', 'labels'));
    }
    
    public function Payments()
    {
        $payment = KhaltiPayment::all();
    
        return view('admin.payment.index', compact('payment'));
    }
    
}






