<?php

namespace App\Http\Middleware;

use Closure;
use App\Device;
use App\Helpers\JsonResponse;
use Illuminate\Support\Str;

class VerifyDeviceCode
{
  use JsonResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Device::find($request->device_id)) {
          if ($request->expectsJson() || Str::contains($request->header('Accept'), ['/json', '+json'])) {
              return $this->responseForbidden('Forbidden.', NULL);
          }
          return redirect('/');
        }
        return $next($request);
    }
}
