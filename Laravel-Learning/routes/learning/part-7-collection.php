<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lecture14\ControllerLecture14;

/******************* Lecture 14: Collection  ****************************/
/**
 *  - Collections là một lớp tiện ích mạnh mẽ được xây dựng trên mảng (array) của PHP, giúp thao tác, xử lý và chuyển đổi dữ liệu một cách linh hoạt và dễ đọc.
 *  - Tài liệu: https://laravel.com/docs/5.3/collections#available-methods
 */
Route::get('/collection-map-14', [ControllerLecture14::class, 'collection_all']);
Route::get('/collection-map-14-filter', [ControllerLecture14::class, 'collection_filter']);
Route::get('/collection-map-14-except', [ControllerLecture14::class, 'collection_except']);
Route::get('/collection-map-14-count', [ControllerLecture14::class, 'collection_count']);
Route::get('/collection-map-14-avg', [ControllerLecture14::class, 'collection_avg']);
Route::get('/collection-map-14-get', [ControllerLecture14::class, 'collection_get']);
Route::get('/collection-map-14-sort-by', [ControllerLecture14::class, 'collection_sort_by']);
Route::get('/collection-map-14-sort-by-desc', [ControllerLecture14::class, 'collection_sort_by_desc']);
Route::get('/collection-map-14-take', [ControllerLecture14::class, 'collection_take']);
Route::get('/collection-map-14-diff', [ControllerLecture14::class, 'collection_diff']);



/**********************************************************************/
/**********************************************************************/
/******************* Laravel 8.0 (bổ sung) ****************************/
/**********************************************************************/
/**********************************************************************/

/****************** Lecture 23: Collection  ***************************/
Route::get('/collection-map-23-chunk', [ControllerLecture14::class, 'collection_chunk']);
Route::get('/collection-map-23-collapse', [ControllerLecture14::class, 'collection_collapse']);
Route::get('/collection-map-23-concat', [ControllerLecture14::class, 'collection_concat']);
Route::get('/collection-map-23-contains', [ControllerLecture14::class, 'collection_contains']);
Route::get('/collection-map-23-dd', [ControllerLecture14::class, 'collection_dd']);
Route::get('/collection-map-23-each', [ControllerLecture14::class, 'collection_each']);
Route::get('/collection-map-23-first', [ControllerLecture14::class, 'collection_first']);
Route::get('/collection-map-23-flip', [ControllerLecture14::class, 'collection_flip']);
Route::get('/collection-map-23-sum', [ControllerLecture14::class, 'collection_sum']);
Route::get('/collection-map-23-min', [ControllerLecture14::class, 'collection_min']);
Route::get('/collection-map-23-max', [ControllerLecture14::class, 'collection_max']);
Route::get('/collection-map-23-toarr', [ControllerLecture14::class, 'collection_to_arr']);
Route::get('/collection-map-23-tojson', [ControllerLecture14::class, 'collection_to_json']);
Route::get('/collection-map-23-to-upper', [ControllerLecture14::class, 'collection_to_upper']);
Route::get('/collection-map-23-lazy', [ControllerLecture14::class, 'collection_lazy']);