<?php

namespace App\Http\Middleware\Lecture25;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Middleware25Ext02
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $age = '')
    {
        if ($age < 10){
            return response()->json([
                'message' => 'Phải nhập số trên 10'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return $next($request);
    }
}
