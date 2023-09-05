<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authUser=$request->user();
        $role=$authUser->role;

        if($request->user() && $request->header('role') == $role){
            return $next($request) ;
        }
       else{
        return Response()->json(['message'=> 'not authorized only admins are allowed'],403);
       }
    }


}
