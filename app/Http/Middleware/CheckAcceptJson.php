<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Closure;

class CheckAcceptJson
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
        if (!($request->expectsJson() || Str::contains($request->header('Accept'), ['/json', '+json']))) {
          return redirect('/');
        }
        return $next($request);
    }
}
