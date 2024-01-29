<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function category()
    {
        $technicians = Technician::all();
        return view('user.category.category',compact('technicians'));
    }
}
