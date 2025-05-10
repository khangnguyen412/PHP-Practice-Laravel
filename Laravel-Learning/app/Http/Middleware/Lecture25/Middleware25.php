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
            /**
             *  - Middleware chỉ luôn trả về một đối tượng thuộc loại Response
             *  - Các hàm trả về Response hợp lệ: 
             *      + response()            => Trả về response tùy chỉnh
             *      + response()->json()    => Trả về JSON response
             *      + response()->view()    => Trả về view render
             *      + redirect()            => Chuyển hướng (redirect)
             *      + redirect()->route()   => Chuyển hướng bằng tên route
             *      + redirect()->back()    => Chuyển hướng về trang trước
             *      + abort()               => Dừng và trả về HTTP error
             *      + $next($request)       => Chuyển request tiếp
             */
            return redirect()->route('login');
        }
        return $next($request);
    }
}
