<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // thư viện nhận tham số cho form post



/******************* Laravel 8.0 ****************************/

/******************* Lecture 3: Route (part 2) ****************************/
/**
 *  Dependency Injection:  
 *  - Kỹ thuật cho phép Laravel tự động đưa đối tượng cần thiết vào hàm (hoặc constructor) mà bạn định nghĩa
 */
Route::get('/test-dependency', function (Request $request){
    return $request->user();
});

/**
 *  Đặt tên cho route
 *  - Laravel có cho phép đặt tên cho route để tiện cho việc quản lý và generate ra route URL.
 *  - Cú pháp
 *      name($url);
 *  - Trong đó:
 *      [url]: các url đc generate bởi route để gọi trong view
 */
use App\Http\Controllers\Lecture24\ControllerLecture24;
Route::get('/test-route-name', [ControllerLecture24::class, 'show'])->name('test-route-name'); // gọi vào /project, menu trên thanh nav

/**
 *  Generate URL sử dụng route name.
 *  - Tạo ra URL qua route name
 *  - Trong Laravel-Learning/resources/views/partials/header.blade.php
 */


 /******************* Lecture 4: Route (part 3) ****************************/
/**
 *  Route subdomain: cho phép định nghĩa các route hoạt động dựa trên subdomain (tên miền phụ)
 *  - Tính năng này rất hữu ích khi bạn muốn phân tách các phần của ứng dụng theo tên miền
 *  - Skip do phải cấu hình lại file nginx/conf.d/default.conf
 */
// Route::domain('admin.docker-laravel.com')->group(function(){
//     Route::get('/', [ControllerLecture24::class, 'show']);
// });

/**
 *  Binding Model Trong Route
 *  - một tính năng mạnh mẽ của Laravel giúp tự động lấy bản ghi tương ứng từ database trực tiếp trong route ko qua controler
 */
use App\Models\lecture12\ModelLecture12 as UserList;
Route::get('/test-bind-model', function(UserList $user){
    return response()->json(['data' => $user->all()], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
});

/**
 *  Lấy route hiện tại.
 */
Route::get('/get-current-route', function (){ 
    $current_route= Route::current()->uri();
    return $current_route;
});