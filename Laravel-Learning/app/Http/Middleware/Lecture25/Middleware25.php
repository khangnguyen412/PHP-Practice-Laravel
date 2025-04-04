<?php

namespace App\Http\Middleware\Lecture25;

use Closure;
use Illuminate\Http\Request;

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
        if (!$request->user()) {
            return response('Access denied. You are not an admin.', 403);
        }

        return $next($request);
    }
}
