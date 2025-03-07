<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

/******************* lecture 14: Collection  ****************************/
/**
 *  - Collections là một lớp tiện ích mạnh mẽ được xây dựng trên mảng (array) của PHP, giúp thao tác, xử lý và chuyển đổi dữ liệu một cách linh hoạt và dễ đọc.
 *  - Tài liệu: https://laravel.com/docs/5.3/collections#available-methods
 */

use App\Http\Controllers\lecture14\controllerLecture14;

Route::get('/collection-map-14', [controllerLecture14::class, 'collection_map']);
Route::get('/collection-map-14-filter', [controllerLecture14::class, 'collection_filter']);
Route::get('/collection-map-14-except', [controllerLecture14::class, 'collection_except']);
Route::get('/collection-map-14-count', [controllerLecture14::class, 'collection_count']);
Route::get('/collection-map-14-avg', [controllerLecture14::class, 'collection_avg']);
Route::get('/collection-map-14-get', [controllerLecture14::class, 'collection_get']);
Route::get('/collection-map-14-sort-by', [controllerLecture14::class, 'collection_sort_by']);
Route::get('/collection-map-14-sort-by-desc', [controllerLecture14::class, 'collection_sort_by_desc']);
Route::get('/collection-map-14-take', [controllerLecture14::class, 'collection_take']);
Route::get('/collection-map-14-diff', [controllerLecture14::class, 'collection_diff']);