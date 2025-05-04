<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Lecture25\ControllerLecture25;

/******************* Lecture 25: Middleware Trong Laravel   ****************************/
/**
 *  - Khái niệm: là lớp trung gian xử lý các request HTTP trước khi đến Controller và các response sau khi rời Controller.
 *  - Nó hoạt động như một "bộ lọc" (filter) hoặc "cầu nối" để kiểm tra, xử lý, hoặc thay đổi request/response theo logic nghiệp vụ trước hoặc sau khi request được xử lý.
 * 
 *  - Cài đặt middleware:
 *      $ php artisan make:middleware [path]/[middleware-name]
 *  - Trong đó:
 *      [path]: là đường dẫn
 *      [middleware-name]: nên của middleware
 * 
 *  - Sau khi tạo xong và file \app\Http\Kernel.php để khai báo middlewave
 */
/**
 *  - Trước khi truy cập ControllerLecture25 thì kiểm tra middleware trước
 *  - Middleware được khai báo trong biến $routeMiddleware của /app/Http/Kernel.php
 */
Route::get('/middleware-forbiden', [ControllerLecture25::class, "show"])->middleware('check-is-admin');