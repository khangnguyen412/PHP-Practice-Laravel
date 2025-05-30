<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lecture12\ControllerLecture12;
use App\Http\Controllers\Lecture13\ControllerLecture13;

/******************* Lecture 12: Eloquent ORM trong Laravel ****************************/
/**
 *  Gọi model trong controller
 *      - Tạo controller qua đường dẫn: /app/Http/Controllers/lecture12/lectureController12.php
 * 
 *  Note trong: /app/Http/Controllers/lecture12/lectureController12.php
 */
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

/******************* Lecture 13: Các mối quan hệ (Relationships) trong Eloquent ****************************/
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
// Eloquent one-to-one 
Route::get('/relations-eloquent-13', [ControllerLecture13::class, 'show_eloquent_relationship_13']);
// Eloquent one-to-many 
Route::get('/relations-eloquent-13-one-many', [ControllerLecture13::class, 'show_eloquent_relationship_13_1']);
// Eloquent many-to-many 
Route::get('/relations-eloquent-13-many-many', [ControllerLecture13::class, 'show_eloquent_relationship_13_2']);

/**********************************************************************/
/**********************************************************************/
/******************* Laravel 8.0 (bổ sung) ****************************/
/**********************************************************************/
/**********************************************************************/

/******************* Lecture 32: Các mối quan hệ (Relationships) trong Eloquent ****************************/
// Eloquent has-many-through
Route::get('/relations-eloquent-13-has-many-through', [ControllerLecture13::class, 'show_eloquent_relationship_13_3']);
// Eloquent morph
Route::get('/relations-eloquent-13-morph', [ControllerLecture13::class, 'show_eloquent_relationship_13_4']);

/******************* Lecture 33: Querying Relationship Existence ****************************/
// Eloquent where
Route::get('/relations-eloquent-with-where-relation', [ControllerLecture13::class, 'show_eloquent_with_where_relation']);
// Eloquent where-has
Route::get('/relations-eloquent-with-where-has', [ControllerLecture13::class, 'show_eloquent_with_where_has']);
// Eloquent or-where-has
Route::get('/relations-eloquent-with-or-where-has', [ControllerLecture13::class, 'show_eloquent_with_or_where_has']);
// Eloquent with-count
Route::get('/relations-eloquent-with-count', [ControllerLecture13::class, 'show_eloquent_with_count']);
// Eloquent with-sum
Route::get('/relations-eloquent-with-sum', [ControllerLecture13::class, 'show_eloquent_with_sum']);
// Eloquent with-avg
Route::get('/relations-eloquent-with-avg', [ControllerLecture13::class, 'show_eloquent_with_avg']);
// Eloquent with-min
Route::get('/relations-eloquent-with-min', [ControllerLecture13::class, 'show_eloquent_with_min']);
// Eloquent with-max
Route::get('/relations-eloquent-with-max', [ControllerLecture13::class, 'show_eloquent_with_max']);

/******************* Lecture 35: Eloquent ORM Collection ****************************/
Route::get('/relations-eloquent-collection-filter', [ControllerLecture13::class, 'show_eloquent_collection_filler']);
Route::get('/relations-eloquent-collection-reject', [ControllerLecture13::class, 'show_eloquent_collection_reject']);
Route::get('/relations-eloquent-collection-where', [ControllerLecture13::class, 'show_eloquent_collection_where']);
Route::get('/relations-eloquent-collection-where-in', [ControllerLecture13::class, 'show_eloquent_collection_where_in']);
Route::get('/relations-eloquent-collection-sum', [ControllerLecture13::class, 'show_eloquent_collection_sum']);
Route::get('/relations-eloquent-collection-avg', [ControllerLecture13::class, 'show_eloquent_collection_avg']);
Route::get('/relations-eloquent-collection-max', [ControllerLecture13::class, 'show_eloquent_collection_max']);
Route::get('/relations-eloquent-collection-count', [ControllerLecture13::class, 'show_eloquent_collection_count']);
Route::get('/relations-eloquent-collection-map', [ControllerLecture13::class, 'show_eloquent_collection_map']);
Route::get('/relations-eloquent-collection-each', [ControllerLecture13::class, 'show_eloquent_collection_each']);
Route::get('/relations-eloquent-collection-transform', [ControllerLecture13::class, 'show_eloquent_collection_transform']);
Route::get('/relations-eloquent-collection-only', [ControllerLecture13::class, 'show_eloquent_collection_only']);
Route::get('/relations-eloquent-collection-groupby', [ControllerLecture13::class, 'show_eloquent_collection_groupby']);
Route::get('/relations-eloquent-collection-sortby', [ControllerLecture13::class, 'show_eloquent_collection_sortby']);
Route::get('/relations-eloquent-collection-unique', [ControllerLecture13::class, 'show_eloquent_collection_unique']);
Route::get('/relations-eloquent-collection-contains', [ControllerLecture13::class, 'show_eloquent_collection_containts']);
Route::get('/relations-eloquent-collection-firstwhere', [ControllerLecture13::class, 'show_eloquent_collection_firstwhere']);
Route::get('/relations-eloquent-collection-isempty', [ControllerLecture13::class, 'show_eloquent_collection_isempty']);
Route::get('/relations-eloquent-collection-load', [ControllerLecture13::class, 'show_eloquent_collection_load']);
Route::get('/relations-eloquent-collection-pluck', [ControllerLecture13::class, 'show_eloquent_collection_pluck']);
Route::get('/relations-eloquent-collection-fresh', [ControllerLecture13::class, 'show_eloquent_collection_fresh']);
Route::get('/relations-eloquent-collection-intersect', [ControllerLecture13::class, 'show_eloquent_collection_intersect']);
Route::get('/relations-eloquent-collection-visible', [ControllerLecture13::class, 'show_eloquent_collection_visible']);
Route::get('/relations-eloquent-collection-hidden', [ControllerLecture13::class, 'show_eloquent_collection_hidden']);

/******************* Lecture 36: Mutator và Cast ****************************/
/**
 *  - Là 2 tính năng cực kỳ hữu ích giúp xử lý dữ liệu đầu vào/đầu ra một cách tự động .
 *  - Accessors cho phép bạn thay đổi giá trị khi lấy từ CSDL , nhưng không ảnh hưởng đến DB thật sự. 
 */
Route::get('/relations-eloquent-accessors', [ControllerLecture13::class, 'show_eloquent_accessors']);

/******************* Lecture 37: Eloquent ORM Serialize ****************************/
Route::get('/relations-eloquent-serialize', [ControllerLecture13::class, 'show_eloquent_serialize']);
Route::get('/relations-eloquent-toarr', [ControllerLecture13::class, 'show_eloquent_toarr']);
Route::get('/relations-eloquent-tojson', [ControllerLecture13::class, 'show_eloquent_tojson']);
