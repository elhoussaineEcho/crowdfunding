<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\User;
use Cache;

class OnlineUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {     
        if(Auth::check()){
            $expireAt=now()->addMinutes(3);
            Cache::put('user-is-online'.Auth::id(),true, $expireAt);
        $user= User::where('id',Auth::id())->update(['last_seen'=>now()]);
        }
        return $next($request);
    }
}
