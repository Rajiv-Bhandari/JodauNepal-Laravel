<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserType; // Assuming you have UserType enum

class UserTypeMiddleware
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = Auth::user();

        if ($user && in_array($user->usertype, $types)) {
            return $next($request);
        }

        // Redirect based on user type
        switch ($user->usertype) {
            case UserType::User:
                return redirect()->route('user.home');
                break;
            case UserType::Admin:
                return redirect()->route('admin.home');
                break;
            case UserType::Technician:
                return redirect()->route('technician.dashboard');
                break;
            default:
                return abort(403); // Or handle the default behavior according to your needs
                break;
        }
    }
}
