<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$r)
    {

        if(isset(Auth::user()->role)){
            if((Auth::user()->role==4)&&$r=="admin"){
                return $next($request);
            }
            
            else if(Auth::user()->role==2&&$r=="guru"){
                return $next($request);
            }
           else if(Auth::user()->role==3&&$r=="wirausaha"){
                return $next($request);
            }
           else if(Auth::user()->role==4&&$r=="kepala"){
                return $next($request);
            }
            else{
            return redirect()->back();
        }
        }
        return redirect()->back();
        
    
    }
}
