<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

// view nằm trong đường dẫn: resources/views


/******************* lecture 6: view ****************************/
/**
 *  -View Trong Laravel thì bắt buộc phải được nằm trong thư mục resources/views
 *  -Đuôi của file view trong laravel có định dạng là .blade.php (blade template)
 *  -Hoặc file .php, nếu blade.php thì phải dùng cú pháp của blade template
 * 
 *  Ví dụ ở đường dẫn: resources/views/lecture06/viewTemplate.blade.php
 * 
 *  Cú pháp: 
 *      $ view('url', 'param');
 *  Trong đó
 *      - 'url' là đường dẫn tới view
 *      - 'param' là tham số truyền vào view (nếu có)
 */
// gọi view trong route
Route::get('test-view-template', function () {
    return view('lecture06.ViewTemplate');
});
// truyền biến vào view có file .php
Route::get('test-view-template-php-file/{param}', function ($param) {
    return view('lecture06.ViewTemplatePhp', ['param' => $param]);
});
// tạo view dùng chung (trong app/Providers/AppServiceProvider.php.)


/** 
 *  Dùng compact() truyền dữ liệu cho view
 * 
 *  Cú Pháp:
 *      $ view('url', compact('param'));
 *  Trong đó 
 *      - 'url' là đường dẫn tới view
 *      - param là đối số truyền vào
 */
Route::get('test-view-template-use-compact/{param}', function ($param) {
    return view("lecture06.viewTemplateUseCompact", compact('param'));
});


/** 
 *  Dùng with() truyền dữ liệu cho view
 * 
 *  Cú Pháp:
 *      $ view('url')->with('key', $value);
 *  Trong đó 
 *      - 'url' là đường dẫn tới view
 *      - 'key' là tên của đối số được truyền
 *      - $value là giá trì của đối số
 */
Route::get('test-view-template-use-with/{param}', function ($param) {
    return view("lecture06.viewTemplateUseWith")->with('param', $param);
});


/** 
 *  Dùng mãng truyền dữ liệu cho view
 * 
 *  Cú Pháp:
 *      $ view('url', ['key' => $value]);
 *  Trong đó 
 *      - 'url' là đường dẫn tới view
 *      - 'key' là tên của đối số được truyền
 *      - $value là giá trì của đối số
 */
Route::get('test-view-template-use-array/{param}', function ($param) {
    return view("lecture06.viewTemplateUseArray", ['param' => $param]);
});


/******************* lecture 7: blade template ****************************/
/**
 *  Blade template: là một view trong laravel đặt trong resources/views có đuôi file .blade.php 
 * 
 *  sử dung blade template
 *  Cú pháp:
 *      $ {{ $variable }}
 *  Trong đó
 *      - $variable là biến được truyền vào
 */
//  truyền tham số /{param} vào view template
Route::get('test-blade-template/{param}', function ($param) {
    return view("lecture07.testViewEngine", ["param" => $param]);
});
// câu lệnh vòng lặp trong blade template
Route::get('test-blade-template-with-loop/', function () {
    return view("lecture07.testViewEngineLoop");
});
// câu lệnh điều kiện trong blade template
Route::get('test-blade-template-with-condition/', function () {
    return view("lecture07.testViewEngineCondition");
});


/******************* lecture 8: blade template (part2) ****************************/
/**
 *  Template kế thừa (Template inheritance)
 *  Ghi chứ bài học trong:
 *      - resources/views/lecture08/testViewTemplateInheritance.blade.php
 *      - resources/views/lecture08/parentTemplate.blade.php
 */
Route::get('test-blade-template-inheritance/', function () {
    return view("lecture08.testViewTemplateInheritance");
});
