<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Lecture21\ControllerLecture21;
use App\Http\Controllers\Lecture23\ControllerLecture23;
use App\Http\Controllers\Lecture24\ControllerLecture24;

/******************* Lecture 22 23 24: Xác thực trong Laravel   ****************************/
/**
 *  - Laravel cung cấp một hệ thống xác thực (Authentication) mạnh mẽ và dễ sử dụng. 
 *  - Giúp bạn quản lý đăng nhập, đăng ký, phân quyền người dùng, và bảo mật hệ thống một cách nhanh chóng.
 *  - Nơi khai báo middleware auth: /app/Http/Kernel.php
 */

/**
 *  - Cách 1: khai báo middleware đơn lẻ
 *  - Giải thích khi gọi tới route authentication thì sẽ chuyển tơi middle auth để xác nhận
 */
// Route::get('/admin-board', [ControllerLecture24::class, 'show'])->middleware('auth');

/**
 *  - Cách 2: khai báo theo nhóm
 */
Route::get('/login', [ControllerLecture23::class, 'show'])->name('login');
Route::post('/login', [ControllerLecture23::class, 'login_handle']);
/**
 *  Lưu ý nếu có báo lỗi: Base table or view not found: 1146 Table '.users' doesn't exist
 *  -> Vào Laravel-Learning/config/auth.php config lại model ở mục `User Providers`
 */
Route::middleware('check-is-admin')->group(function(){
    Route::get('/admin-board', [ControllerLecture24::class, 'show']);
});

/**
 *  - Định danh route để gọi từ template
 */
Route::post('/submit-register', [ControllerLecture23::class, 'resigter_handle'])->name('submit_register');