<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
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
        // Votre logique d'authentification pour les clients
        // $client = Client::where('email', $request->email)->first();
        // dd('Authentification réussie');
        if (Auth::guard('client')->check()) {
            
            return $next($request);
        }

        return redirect()->route('login');
    }
}
