<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()){
            if (Auth::user()->roles_id == 3){
                return $next($request);
            }
            else if (Auth::user()->roles_id == 1){
                return redirect('/marketing-manager/home')->with('status','You can not access thí page');
            }
            else if (Auth::user()->roles_id == 2){
                return redirect('/marketing-coordinator/home')->with('status','You can not access thí page');
            }
            else if (Auth::user()->roles_id == 4){
                return redirect('/student/index')->with('status','You can not access thí page');
            }
            else{
                return redirect('/guest/home')->with('status','You can not access thí page');
            }
        }
        else{
            return redirect('/login')->with('status','please loggin');
        }
    }
}
