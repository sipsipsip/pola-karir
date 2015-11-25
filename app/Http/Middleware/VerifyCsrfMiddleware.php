<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfMiddleware extends \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken {

    public function handle($request, Closure $next)
    {
        if ($this->isReading($request) || $this->excludedRoutes($request) || $this->tokensMatch($request))
        {
            return $this->addCookieToResponse($request, $next($request));
        }

        throw new TokenMismatchException;
    }

    protected function excludedRoutes($request)
    {
        $routes = [
                'some/route/path',
                'users/non-protected-route',
                'api/v1/pegawai/{id}/rencana-karir',
                'api/v1/pegawai/{:id}/manajer'
        ];

        foreach($routes as $route)
            if ($request->is($route))
                return true;

            return true;
    }
}