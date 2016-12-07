<?php
namespace Smartisan\Locally\Http\Middlewares;

use Closure;

class LocallyMiddleware
{
    /**
     * Set application locale to user preference.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locally = app('Smartisan\Locally\Locally');

        if (auth()->check()) {
            $locale = auth()->user()->locale;
            if ($locally->exists($locale)) {
                app()->setLocale($locale);
            }
        } else {
            app()->setLocale(config('app.locale'));
        }

        return $next($request);
    }
}