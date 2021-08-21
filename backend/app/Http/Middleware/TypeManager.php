<?php

namespace App\Http\Middleware;

use Closure;
use APP\Models\User;

class TypeManager
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
        if($request->session()->get('type') == '2')
        {
            return $next($request);
        }
        else{
             return redirect("/");
        }

    }
}