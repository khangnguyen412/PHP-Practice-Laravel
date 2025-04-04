<?php

/******************* Gọi Thư Viện ****************************/

use App\Http\Controllers\Lecture21\ControllerLecture21;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Lecture22\ControllerLecture22;

/******************* lecture 22: Xác Thực Trong Laravel   ****************************/
/**
 *  - Laravel cung cấp một hệ thống xác thực (Authentication) mạnh mẽ và dễ sử dụng. 
 *  - Giúp bạn quản lý đăng nhập, đăng ký, phân quyền người dùng, và bảo mật hệ thống một cách nhanh chóng.
 *  
 *  - THIẾU CSDL: LÀM LẠI CSDL CÓ NGƯỜI DÙNG
 */
Route::get('/authentication', [ControllerLecture21::class, 'show'])->middleware('auth');
