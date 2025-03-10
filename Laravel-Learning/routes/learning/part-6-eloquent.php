<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

/******************* lecture 12: Eloquent ORM trong Laravel ****************************/
/**
 *  Gọi model trong controller
 *      - Tạo controller qua đường dẫn: /app/Http/Controllers/lecture12/lectureController12.php
 * 
 *  Note trong: /app/Http/Controllers/lecture12/lectureController12.php
 */

use App\Http\Controllers\lecture12\controllerLecture12;
// gọi model từ controller
Route::get('/model-12', [controllerLecture12::class, "test"]);
// lấy tất cả datable trên bảng dữ liệu
Route::get('/get-data-model-12', [controllerLecture12::class, "getData"]);
// lấy ra một dòng dữ liệu bằng khóa chính
Route::get('/get-by-primary-key-model-12', [controllerLecture12::class, "getByPrimaryKey"]);
// lấy dữ liệu với điều kiện
Route::get('/get-by-condition-model-12', [controllerLecture12::class, "getByCondition"]);
// chọn cột dữ liệu được lấy
Route::get('/get-by-column-model-12', [controllerLecture12::class, "getByColumn"]);
// đếm dữ liệu trong bảng 
Route::get('/count-data-model-12', [controllerLecture12::class, "countData"]);
// thêm dữ liệu vào bảng
Route::get('/add-data-model-12', [controllerLecture12::class, "addData"]);
// cập nhật dữ liệu trong bảng
Route::get('/update-dataModel-12', [controllerLecture12::class, "updateData"]);
// xóa dữ liệu trong bảng
Route::get('/delete-dataModel-12', [controllerLecture12::class, "deleteData"]);

/******************* lecture 13: Các mối quan hệ (Relationships) trong Eloquent ****************************/
/**
 *  Các mối quan hệ trong Eloquent.
 *      - Tạo controller qua đường dẫn: /app/Http/Controllers/lecture13/lectureController13.php
 *      - Tạo model: php artisan make:model lecture13\modelLecture13 --migration
 * 
 *  Note trong: 
 *      /app/Http/Controllers/lecture13/lectureController13.php
 *      /app/Models/lecture13
 * 
 *  Link Fix Lỗi: viblo.asia/p/eloquent-relationships-in-laravel-phan-1-PdbGnoEdeyA
 */

use App\Http\Controllers\lecture13\controllerLecture13;
// Eloquent one-to-one 
Route::get('/relations-eloquent-13', [controllerLecture13::class, 'show_eloquent_relationship_13']);
// Eloquent one-to-many 
Route::get('/relations-eloquent-13-one-many', [controllerLecture13::class, 'show_eloquent_relationship_13_1']);
// Eloquent many-to-many 
Route::get('/relations-eloquent-13-many-many', [controllerLecture13::class, 'show_eloquent_relationship_13_2']);
