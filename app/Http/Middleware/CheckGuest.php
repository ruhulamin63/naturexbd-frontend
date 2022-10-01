<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckGuest
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
        if(!session()->has('client_id'))
        {
            if(!session()->has('guest_id')){
            Session::put('guest_id',rand(1000,99999)); 
            }
                
        }
        return $next($request);
    }
}