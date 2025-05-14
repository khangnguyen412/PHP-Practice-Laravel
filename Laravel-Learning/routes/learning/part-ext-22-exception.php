<?php

use App\Exceptions\TestException;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/******************* Lecture 22: Exception ****************************/
/**
 *  - Exception Handler: là một lớp (class) trung tâm để quản lý xử lý các lỗi (exceptions) xảy ra trong ứng dụng.
 *  - Tạo Exception:
 *      $ php artisan make:exception [tên-folder]/[tên-file]
 *  - Sau chạy lện sẽ tạo ra file trong thư mục: /app/Exceptions/[tên-file]
 */
Route::get('/exception-test', function(){
    return throw new TestException();
});
