<?php 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and approved
        if (!Auth::check() || !Auth::user()->is_approved) {
            //abort(403, 'Unauthorized access, you are not approved yet.');
        }

        return $next($request);
    }
}