<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::guard('admin')->user();

    // Check if the user is not authenticated
    if (!$user) {
        return back()->with('error', 'Anda harus login untuk mengakses halaman ini.');
    }

    $userRole = $user->Role;

    // Check if the user's role matches the required role
    if ($userRole !== $role) {
        // If the role is null or doesn't match, you can handle it accordingly
        return back()->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }

    return $next($request);
    }
}
