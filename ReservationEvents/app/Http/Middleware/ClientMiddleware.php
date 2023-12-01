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
   // app/Http/Middleware/CheckClientMiddleware.php

public function handle($request, Closure $next)
{
    // Vérifier si l'utilisateur est authentifié en tant que client
    if (auth('client')->check()) {
        dd('ok');
        return $next($request);
    }

    return redirect()->route('login')->with('error', 'Accès interdit pour les clients');
}

}
