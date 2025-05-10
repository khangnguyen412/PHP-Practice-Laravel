<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lecture26\ControllerLecture26;
use App\Http\Controllers\Lecture24\ControllerLecture24Ext;
use App\Http\Controllers\LectureExt\ControllerLectureExt;

/******************* Lecture 26: Debugbar ****************************/
/**
 *  - Là package giúp hiển thị thông tin debug trực quan trong một thanh toolbar
 *  - Chạy lệnh: 
 *      $ composer require barryvdh/laravel-debugbar --dev
 */
Route::get('/test-debugbar', [ControllerLecture26::class, 'show_debug']);

/******************* lecture 27: Directives ****************************/
/**
 *  - Skip do học thêm frontend framework
 */