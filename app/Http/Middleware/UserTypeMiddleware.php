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

        return abort(403); // Or redirect to a different route or show an error page
    }
}

