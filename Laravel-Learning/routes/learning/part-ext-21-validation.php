<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Rules\ValidCustomRule;
use App\Http\Requests\LectureExt\RequestFormExt;

/******************* Lecture 21: Validations ****************************/
/**
 *  - Tạo custom rule 
 *      $ php artisan make:rule [tên-folder]/[tên-file]
 *  - Thực thi lệnh xong laravel sẽ tạo ra: app/Rules/
 */
Route::get('/valid-ext-test', function (){
    return view('lectureExt.view-lecture-ext03');
});
Route::post('/valid-ext', function(RequestFormExt $request){
    return $request->validated();
});