<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsClient {
    public function handle(Request $request, Closure $next) {
        if (!Auth::check()) return redirect()->route('login')->with('error', 'Connectez-vous.');
        if (!Auth::user()->isClient()) abort(403, 'Acces reserve aux clients.');
        return $next($request);
    }
}
