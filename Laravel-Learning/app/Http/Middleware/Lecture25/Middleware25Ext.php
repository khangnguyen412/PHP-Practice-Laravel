<?php

namespace App\Http\Middleware\Lecture25;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Middleware25Ext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $id = '')
    {
        if (!in_array($id, [1, 3, 13])){
            return response()->json([
                'message' => 'Ko phải id 13'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        return $next($request);
    }
}
