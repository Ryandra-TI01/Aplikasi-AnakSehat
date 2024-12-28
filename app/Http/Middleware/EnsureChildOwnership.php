<?php

namespace App\Http\Middleware;

use App\Models\Child;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureChildOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $childId = $request->route('id'); // Mengambil child_id dari route
        $child = Child::find($childId);
        $user = Auth::user();
        // Cek apakah anak ada dan dimiliki oleh user yang login
        if ($child->user_id !== $user->id) {
            abort(403, 'Unauthorized access to this child\'s data.');
        }

        return $next($request);
    }
}
