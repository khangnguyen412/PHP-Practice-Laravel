<?php

namespace App\Http\Middleware\Lecture25;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Middleware25
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
        // Kiểm tra có phải là admin hay ko? nếu sai trả ra 403 forbiden
        if (!Auth::check()) {
            return route('login');
        }
        return $next($request);
    }
}
