<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Association;
use Illuminate\Support\Facades\Auth;

class AssociationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Votre logique d'authentification pour les associations
        // $association = Association::where('email', $request->email)->first();

        if (Auth::guard('association')->check()) {
            // Authentification réussie
            return $next($request);
        }

        return redirect()->route('login');
    }
}
