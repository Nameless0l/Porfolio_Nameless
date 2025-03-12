<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageView;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Ne pas enregistrer les pages d'administration ou assets
        if (
            !$request->is('admin/*') &&
            !$request->is('api/*') &&
            $request->isMethod('get') &&
            !$request->ajax() &&
            $request->route() !== null
        ) {
            // Enregistrer la vue après l'envoi de la réponse pour ne pas affecter les performances
            PageView::track($request->path(), $request);
        }

        return $response;
    }
}
