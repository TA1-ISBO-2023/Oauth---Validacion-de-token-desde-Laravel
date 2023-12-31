<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class Autenticacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!$request -> hasHeader("Authorization"))
            return response(['message' => 'Not Authenticated'], 401);


        $token = explode(" ", $request -> header("Authorization"))[1];
        if(Cache::has($token)){
            return $next($request);
        }

        $tokenHeader = [ "Authorization" => $request -> header("Authorization")];
        $response = Http::withHeaders($tokenHeader)->get(getenv("API_AUTH_URL") . "/validate");


        if($response -> successful()){
            Cache::put($token , $response -> json(), 500);
            return $next($request);
        }

        return response(['message' => 'Not Allowed'], 403);





    }
}
