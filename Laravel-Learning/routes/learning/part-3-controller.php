<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Lecture09\ControllerLecture09;
use App\Http\Controllers\Lecture09\ControllerLecture09Ext;
use App\Http\Controllers\Lecture09\ControllerLecture09Ext02;
use App\Http\Controllers\Lecture09\ControllerLecture09Ext03;
use App\Http\Controllers\lecture09\ControllerLecture09Ext04;

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


// Gọi tới controller có đường dẫn app/http/lecture09/lecture09.php và thực hiện hàm index
Route::get('/call-controller', [ControllerLecture09::class, 'test_controller']);
// Gọi tới hàm addDB trong controller 
Route::get('/data-to-controller', [ControllerLecture09::class, 'add_db']);
// Truyền tham số {param} cho vào controler
Route::get('/param-to-controller/{param}/', [ControllerLecture09::class, 'get_name']);
// Truyền tham số {param} cho vào controler kèm theo điều kiện regex
// Điều kiện sai => kết quả NOT FOUND
Route::get('/param-to-controller-with-condition/{param}/', [ControllerLecture09::class, 'get_name'])->where(['param' => '[a-zA-Z]+']);




/**********************************************************************/
/**********************************************************************/
/******************* Laravel 8.0 (bổ sung) ****************************/
/**********************************************************************/
/**********************************************************************/

/******************* Lecture 17: Controller ****************************/
/**
 *  - Invoke: 
 *      + cho phép triển khai một controller như một single-action controller (controller chỉ xử lý một action duy nhất). 
 *      + Khi một class có phương thức này, có thể gọi instance của class đó như một hàm.
 */
Route::get('/test-invoke/{name}', ControllerLecture09Ext::class);
/**
 *  - Áp dụng middleware vào controller
 */
Route::get('/test-middleware-controller', [ControllerLecture09Ext02 ::class, 'get_userlist']);
Route::get('/test-middleware-controller/{name}', [ControllerLecture09Ext03::class, 'get_user_id_13']);
Route::get('/test-middleware-controller-condition', [ControllerLecture09Ext03::class, 'get_user_id_13']);
/**
 *  - Resource Controller: 
 *      + Là một loại controller được thiết kế để xử lý các thao tác CRUD (Create, Read, Update, Delete)
 *      + cung cấp một cách nhanh chóng để tạo và sử dụng Resource Controller thông qua lệnh Artisan
 *      + Nó tự động ánh xạ các phương thức với các route RESTful API.
 *  - Cú Pháp
 *      $ php artisan make:controller [tên sub folder]/[tên controller] --resource
 */
/**
 *  - Tự động sinh ra các route RESTful cho model Post
 *  - Gọi trong template: {{route([route-name].[method], $param)}}
 */
Route::resource('/test-resource-controller', ControllerLecture09Ext04::class);
/**
 *  - Chỉ sử dụng 1 số route được chỉ định
 */
Route::resource('/test-resource-controller-only', ControllerLecture09Ext04::class)->only('index');
/**
 *  - Loại 1 số route được chỉ định
 *  - Nếu cố gọi vào sẽ lỗi
 *      + Lỗi: Illuminate\Contracts\Routing\UrlGenerationException
 *      + Route [posts.destroy] không tồn tại
 */
Route::resource('/test-resource-controller-except', ControllerLecture09Ext04::class)->except('index');
/**
 *  - Sử dụng xây dụng APi (Chỉ sinh ra 5 route: index, store, show, update, destroy )
 *  - Mục đích sủ dụng kết hợp vói framework frontend
 */
Route::apiResource('/test-resource-controller-api', ControllerLecture09Ext04::class);
/**
 *  - Đổi tên cho resource
 */
Route::apiResource('/test-resource-controller-rename', ControllerLecture09Ext04::class)->names([
    'index' => 'userlist.all', // nếu muốn gọi tới trong template thì dùng {{ route(userlist.all, $param->property ) }}
]); 