<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

// Controller nằm trong đường dẫn: app/http

/******************* Lecture 9: Controller trong laravel ****************************/
/**
 *  Tạo thư mục phụ trong controler:
 *  - Trường hợp có file sẵn cấu trúc lại:
 *      + tạo sub folder và kéo file vào
 *      + tại file này khai báo lại đường dẫn, vd: App\Http\Controllers\Lecture09\adminController;
 *      + trong file đc kéo vào sub folder, khai báo lại 2 đường dẫn, ví dụ:
 *          namespace App\Http\Controllers\Lecture09;
 *          use App\Http\Controllers\Controller;
 * 
 *  - Trường hợp chứ có file dùng lệnh: php artisan make:controller [tên sub folder]/[tên controller]
 * 
 *  Cú pháp gọi controller:
 *      $ [controllerClass::class, "function"]
 *  Trong đó
 *      - controllerClass lớp đối tượng được khai báo
 *      - function là hàm bên trong lớp đói tượng đó
 */

use App\Http\Controllers\Lecture09\ControllerLecture09;
// Gọi tới controller có đường dẫn app/http/lecture09/lecture09.php và thực hiện hàm index
Route::get('/call-controller', [ControllerLecture09::class, 'test_controller']);
// Gọi tới hàm addDB trong controller 
Route::get('/data-to-controller', [ControllerLecture09::class, 'add_db']);
// Truyền tham số {param} cho vào controler
Route::get('/param-to-controller/{param}/', [ControllerLecture09::class, 'get_name']);
// Truyền tham số {param} cho vào controler kèm theo điều kiện regex
// Điều kiện sai => kết quả NOT FOUND
Route::get('/param-to-controller-with-condition/{param}/', [ControllerLecture09::class, 'get_name'])->where(['param' => '[a-zA-Z]+']);
