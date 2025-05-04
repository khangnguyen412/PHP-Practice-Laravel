<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // thư viện nhận tham số cho form post

/******************* Lecture 8: Template ****************************/
Route::get('/test-blade-template-ext', function ($param) {
    return view("lecture-ext-8-01.test-view-engine");
});