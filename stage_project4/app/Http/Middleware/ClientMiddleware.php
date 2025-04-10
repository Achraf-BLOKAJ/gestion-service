<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user(); // Get the currently authenticated user

            // Check if the user is 'commercial'
            if ($user->role == 'technicien') {
                // If the user is trying to access the 'commercial.index' route, deny access
                if ($request->route()->getName() == 'clients.index') {
                    return abort(403, 'You do not have permission to access this page.');
                }
            }

            // Allow the request to proceed if it's not restricted for 'commercial' users
            return $next($request);

        } else {
            // If the user is not authenticated, log them out and redirect to login page
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
