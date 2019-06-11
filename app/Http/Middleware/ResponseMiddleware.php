<?php

namespace App\Http\Middleware;

use Closure;

class ResponseMiddleware
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
        if($request->isMethod('OPTIONS')) {
            $response = response('', 200);
        }else{
            $response = $next($request);
        }
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Headers', '*');
        $response->header('Access-Control-Expose-Headers', 'Authorization');
        $response->header('Access-Control-Allow-Methods', '*');
        return $response;
    }
}
