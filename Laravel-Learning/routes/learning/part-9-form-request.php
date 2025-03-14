<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Lecture18\ControllerLecture18;

/******************* lecture 18: Form Request  ****************************/
Route::get('/form-request', [ControllerLecture18::class, 'get_form']);
Route::post('/sent-request', [ControllerLecture18::class, 'handle_request']);