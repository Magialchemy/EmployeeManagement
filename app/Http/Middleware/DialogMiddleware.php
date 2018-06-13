<?php

namespace App\Http\Middleware;

use \Illuminate\Http\Response;
use Closure;

class DialogMiddleware
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
        $request->merge(['msg' => '変更が完了しました。']);
        $response = $next($request);
        return $response;
    }
}
