<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Lecture18\ControllerLecture18;
use App\Http\Controllers\Lecture19\ControllerLecture19;

/******************* lecture 18: Form Request  ****************************/
/**
 *  Doc về Form Request: https://laravel.com/docs/8.x/requests
 */
Route::get('/form-request', [ControllerLecture18::class, 'get_form']);
Route::post('/sent-request', [ControllerLecture18::class, 'handle_request']);

/******************* lecture 19: Uploadfile  ****************************/
/** 
 *  - Tạo liên kết symbolic link giúp truy cập file đã upload thông qua URL: 
 *      $ php artisan storage:link
 *  - Xem file được upload qua url: http://[domain]/storage/uploads/[file-name]
 */
Route::get('/form-upload-file', [ControllerLecture19::class, 'get_form']);
Route::post('/sent-upload-file', [ControllerLecture19::class, 'handle_upload_file']);

/******************* lecture 20: Validations  ****************************/
/**
 *  
 */
