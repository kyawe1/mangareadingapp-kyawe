<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //** @var \App\Models\Users */
        $user=request()->user();
        $role=$user->is_in_role('admin');
        if(Auth::check() && $role) {
            return $next($request);
        }
        return redirect(status: 401)->route("home")->with('error',"not access to admin");
        
    }
}
