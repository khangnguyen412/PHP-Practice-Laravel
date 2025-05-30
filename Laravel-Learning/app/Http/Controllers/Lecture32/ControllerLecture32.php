<?php

namespace App\Http\Controllers\Lecture32;

use Barryvdh\Debugbar\Facades\Debugbar; // thư viện debugbar
use App\Http\Controllers\Controller;

use App\Models\lecture13\ModelLecture13Users;
use App\Models\lecture32\ModelLecture32;

class ControllerLecture32 extends Controller
{
    /**
     *  - Gọi và sử dụng event
     */
    public function check_event()
    {
        $list = ModelLecture13Users::all();
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  - Sử dụng event qua observe
     *  - Tạo file qua lệnh
     *      $ php artisan make:observer Observer --model=[tên model]
     *  - Các sử dụng: /app/Observers/Observer.php
     *  - Khai báo trong provider: Laravel-Learning/app/Providers/AppServiceProvider.php
     */
    public function check_event_observer()
    {
        $list = ModelLecture13Users::get();
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  - Gọi và sử dụng event
     */
    public function disable_event()
    {
        $list = ModelLecture13Users::withoutEvents(function () {
            // Bỏ qua mọi thao tác của event
            ModelLecture13Users::all();
        });
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
