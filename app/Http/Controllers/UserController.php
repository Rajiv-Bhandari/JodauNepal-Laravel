<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\Category;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function category($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $technicians = $category->technicians()->get();
    
        return view('user.category.category', compact('technicians','category'));
    }
}
