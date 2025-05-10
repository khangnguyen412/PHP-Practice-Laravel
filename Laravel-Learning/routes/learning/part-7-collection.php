<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lecture14\ControllerLecture14;

/******************* Lecture 14: Collection  ****************************/
/**
 *  - Collections là một lớp tiện ích mạnh mẽ được xây dựng trên mảng (array) của PHP, giúp thao tác, xử lý và chuyển đổi dữ liệu một cách linh hoạt và dễ đọc.
 *  - Tài liệu: https://laravel.com/docs/5.3/collections#available-methods
 */
Route::get('/collection-map-14', [ControllerLecture14::class, 'collection_map']);
Route::get('/collection-map-14-filter', [ControllerLecture14::class, 'collection_filter']);
Route::get('/collection-map-14-except', [ControllerLecture14::class, 'collection_except']);
Route::get('/collection-map-14-count', [ControllerLecture14::class, 'collection_count']);
Route::get('/collection-map-14-avg', [ControllerLecture14::class, 'collection_avg']);
Route::get('/collection-map-14-get', [ControllerLecture14::class, 'collection_get']);
Route::get('/collection-map-14-sort-by', [ControllerLecture14::class, 'collection_sort_by']);
Route::get('/collection-map-14-sort-by-desc', [ControllerLecture14::class, 'collection_sort_by_desc']);
Route::get('/collection-map-14-take', [ControllerLecture14::class, 'collection_take']);
Route::get('/collection-map-14-diff', [ControllerLecture14::class, 'collection_diff']);