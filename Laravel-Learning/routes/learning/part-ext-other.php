<?php

use App\Http\Controllers\LectureExt\ControllerLectureExt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\lecture12\ModelLecture12;

/******************* Lecture: Dependency Injection ****************************/
/**
 *  - Là một design pattern trong lập trình hướng đối tượng, giúp tách biệt logic của một class với việc khởi tạo các phụ thuộc (dependencies).
 *  - Thay vì một class tự tạo ra các phụ thuộc của nó (ví dụ: kết nối database, service, repository), bạn sẽ tiêm (inject) các phụ thuộc đó từ bên ngoài vào, giúp ứng dụng linh hoạt , dễ test , và dễ bảo trì.
 */

Route::get('/test-dependency-injection-route', [ControllerLectureExt::class, 'dependency_injection_contructor']);
Route::get('/test-dependency-injection-method', [ControllerLectureExt::class, 'dependency_injection_method']);
Route::get('/test-dependency-injection-prop', [ControllerLectureExt::class, 'dependency_injection_property']);