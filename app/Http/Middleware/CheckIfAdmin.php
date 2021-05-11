<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $prefix = $request->route()->getPrefix();
        if($user->roles[0]->title !== 'Admin' && $prefix == "/Admin"){
            return abort(403, 'Forbidden');
        }else{
            if($user->roles[0]->title == "Admin" && $prefix != "/Admin"){
                return abort(403, 'Forbidden');
            }
        }
        return $next($request);
    }
}
