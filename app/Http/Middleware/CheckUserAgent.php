<?php

namespace App\Http\Middleware;

use App\Helpers\JsonResponse;
use Closure;
use Illuminate\Support\Str;

class CheckUserAgent
{

    use JsonResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param mixed $userAgent
     * @return mixed
     */
    public function handle($request, Closure $next, $userAgent)
    {
      if ($request->header('User-Agent') != $userAgent) {
            if ($request->expectsJson() || Str::contains($request->header('Accept'), ['/json', '+json'])) {
                return $this->responseForbidden('Forbidden.', NULL);
            }
            else return redirect('/');
        }
        return $next($request);
    }
}
