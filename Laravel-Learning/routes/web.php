<?php

// gọi thư viện
use Illuminate\Support\Facades\Route; // thư viện nhận route

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/**
 *  Các lecture được di chuyển vào mục Laravel-Learning/routes/learning
 */

/******************* Tách riêng các route thành nhũng file nhỏ ****************************/
/**
 *  Vào ./app/Providers/RouteServiceProvider.php
 *  Tại public function boot() add thêm các route theo: 
 *      $ Route::middleware('web')->namespace($this->namespace)->group([mãng các base_path()])
 */

/******************* Project ****************************/
Route::get('/project', function () {
    return view("project.project");
});

/******************* Api ****************************/
/**
 *  Tạo Resource Controllers: trong routes/api.php
 *  Cách 1 - Tạo controller bằng lệnh: 
 *      $ php artisan make:controller [tên thư mục]/[tên controller] --api
 *  Cách 2 - Tạo controller có model bằng lệnh: 
 *      $ php artisan make:controller [tên thư mục]/[tên controller] --api --model=[tên thư mục]/[tên model]
 */

/******************* connect api wp ****************************/

use App\Http\Controllers\WpConnectApi\WpConnectApi;

Route::get('/wp-api', [WpConnectApi::class, 'get_wp_api']);

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
Route::get('logs', [LogViewerController::class, 'index']); // thêm middleware nếu cần