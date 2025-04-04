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

use App\Http\Controllers\Lecture12\ControllerLecture12;
// gọi model từ controller
Route::get('/model-12', [ControllerLecture12::class, "test"]);
// lấy tất cả datable trên bảng dữ liệu
Route::get('/get-data-model-12', [ControllerLecture12::class, "get_data"]);
// lấy ra một dòng dữ liệu bằng khóa chính
Route::get('/get-by-primary-key-model-12', [ControllerLecture12::class, "get_by_primary_key"]);
// lấy dữ liệu với điều kiện
Route::get('/get-by-condition-model-12', [ControllerLecture12::class, "get_by_condition"]);
// chọn cột dữ liệu được lấy
Route::get('/get-by-column-model-12', [ControllerLecture12::class, "get_by_column"]);
// đếm dữ liệu trong bảng 
Route::get('/count-data-model-12', [ControllerLecture12::class, "count_data"]);
// thêm dữ liệu vào bảng
Route::get('/add-data-model-12', [ControllerLecture12::class, "add_data"]);
// cập nhật dữ liệu trong bảng
Route::get('/update-data-model-12', [ControllerLecture12::class, "update_data"]);
// xóa dữ liệu trong bảng
Route::get('/delete-data-model-12', [ControllerLecture12::class, "delete_data"]);

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

use App\Http\Controllers\Lecture13\ControllerLecture13;
// Eloquent one-to-one 
Route::get('/relations-eloquent-13', [ControllerLecture13::class, 'show_eloquent_relationship_13']);
// Eloquent one-to-many 
Route::get('/relations-eloquent-13-one-many', [ControllerLecture13::class, 'show_eloquent_relationship_13_1']);
// Eloquent many-to-many 
Route::get('/relations-eloquent-13-many-many', [ControllerLecture13::class, 'show_eloquent_relationship_13_2']);
