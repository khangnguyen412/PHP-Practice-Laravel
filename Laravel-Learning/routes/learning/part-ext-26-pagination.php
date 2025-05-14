<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\lecture12\ModelLecture12;

/******************* Lecture 22: Exception ****************************/
/**
 *  - Exception Handler: là một lớp (class) trung tâm để quản lý xử lý các lỗi (exceptions) xảy ra trong ứng dụng.
 *  - Tạo Exception:
 *      $ php artisan make:exception [tên-folder]/[tên-file]
 *  - Sau chạy lện sẽ tạo ra file trong thư mục: /app/Exceptions/[tên-file]
 */
Route::get('/pagi-query-builder-test', function(){
    $user_pagi = DB::table('laravelweb_pages')->paginate(10);
    return response()->json([
        'message'           => "Thành công ",
        'data'              => $user_pagi,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
});

Route::get('/pagi-eloquent-test', function(){
    $user_pagi = ModelLecture12::paginate(10);
    return response()->json([
        'message'           => "Thành công ",
        'data'              => $user_pagi,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
});