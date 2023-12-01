<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssociationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/CheckAssociationMiddleware.php

public function handle($request, Closure $next)
{
    // Vérifier si l'utilisateur est authentifié en tant qu'association
    if (auth('association')->check()) {
        return $next($request);
    }

    return redirect()->route('login')->with('error', 'Accès interdit pour les associations');
}

}
