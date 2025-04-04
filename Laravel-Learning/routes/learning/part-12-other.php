<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Lecture26\ControllerLecture26;

/******************* lecture 26: Debugbar ****************************/
/**
 *  - Là package giúp hiển thị thông tin debug trực quan trong một thanh toolbar
 *  - Chạy lệnh: 
 *      $ composer require barryvdh/laravel-debugbar --dev
 */
Route::get('/test-debugbar', [ControllerLecture26::class, 'show_debug']);


