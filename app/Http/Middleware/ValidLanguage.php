<?php

namespace App\Http\Middleware;

use App\Models\Languages;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class ValidLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
	{
		$locale = $request->route('language');

		// Si la locale est vide (cas de /), on applique la langue par défaut
		if (empty($locale)) {
			App::setLocale(config('app.locale'));
			return $next($request);
		}

		// Si la langue est invalide
		if (!Languages::check($locale)) {
			return abort(401, 'Langue non autorisée');
		}

		App::setLocale($locale);
		return $next($request);
	}
}
