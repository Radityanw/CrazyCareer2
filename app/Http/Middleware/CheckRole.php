<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
{
    // Log or dump information for debugging
    info('CheckRole Middleware: Request received.');

    // If the user is authenticated
    if (auth()->check()) {
        // Log or dump user information for debugging
        info('User Role:', ['role' => auth()->user()->role]);

        // If the user's role is not in the allowed roles
        if (!in_array(auth()->user()->role, $roles)) {
            // Log or dump information for debugging
            info('CheckRole Middleware: Unauthorized action. Redirecting to /not_recruiter');

            // Redirect to the specified page
            return redirect()->route('not_recruiter');
        }
    } else {
        // Log or dump information for debugging
        info('CheckRole Middleware: User is not authenticated.');
    }

    // Continue with the next middleware or the request handler
    return $next($request);
}

}
