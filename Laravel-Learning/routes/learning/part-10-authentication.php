<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Lecture21\ControllerLecture21;
use App\Http\Controllers\Lecture22\ControllerLecture22;

/******************* lecture 22: Xác Thực Trong Laravel   ****************************/
/**
 *  - Laravel cung cấp một hệ thống xác thực (Authentication) mạnh mẽ và dễ sử dụng. 
 *  - Giúp bạn quản lý đăng nhập, đăng ký, phân quyền người dùng, và bảo mật hệ thống một cách nhanh chóng.
 *  - Nơi khai báo middleware auth: /app/Http/Kernel.php
 */

/**
 *  - Cách 1: khai báo middleware đơn lẻ
 *  - Giải thích khi gọi tới route authentication thì sẽ chuyển tơi middle auth để xác nhận
 */
// Route::get('/authentication', [])->middleware('auth');

/**
 *  - Cách 2: khai báo theo nhóm
 */
Route::middleware('auth')->group(function(){
    Route::get('/authentication', []);
});

/**
 *  - Định danh route để gọi từ template
 */
Route::post('/submit-register', [ControllerLecture22::class, 'resigter_handle'])->name('submit_register');