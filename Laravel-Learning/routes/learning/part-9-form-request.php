<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lecture18\ControllerLecture18;
use App\Http\Controllers\Lecture19\ControllerLecture19;
use App\Http\Controllers\Lecture20\ControllerLecture20;
use App\Http\Controllers\Lecture21\ControllerLecture21;

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
 *  - Tạo rule validations
 *  - Tham khảo các rule có sẳn: https://laravel.com/docs/9.x/validation#available-validation-rules
 */
Route::get('/form-valid', [ControllerLecture20::class, 'get_form']);
Route::post('/sent-valid', [ControllerLecture20::class, 'validations_form']);

/******************* lecture 21: Form Request trong Validations  ****************************/
/**
 *  - Tạo Form Request trong Validations:
 *      $ php artisan make:request [folder]/[file-name]
 *  - Trong đó: 
 *      [folder]: đường dẫn folder mà file đc tạo bắt đầu từ folder app/Http/Requests/
 *      [file-name]: tên file
 */
Route::get('/form-request-valid', [ControllerLecture21::class, 'get_form']);
Route::post('/sent-request-valid', [ControllerLecture21::class, 'validations_form_request']);