<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Lecture31\ControllerLecture31;

/******************* Lecture 31: Query Scope ****************************/
/**
 *  - Là một công cụ mạnh mẽ tái sử dụng logic truy vấn (query logic) trong Model, giúp code sạch hơn , dễ bảo trì hơn và tránh lặp code .
 *  - Có 2 loại Scope: Local Scope, Global Scope
 *  - LocalScope: cho phép bạn định nghĩa các điều kiện truy vấn có thể tái sử dụng trong model.
 */

Route::get('/test-local-scope', [ControllerLecture31::class, 'check_local_scope']);
Route::get('/test-global-scope', [ControllerLecture31::class, 'check_global_scope']);
Route::get('/test-disable-global-scope', [ControllerLecture31::class, 'disable_scope']);