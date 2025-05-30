<?php

namespace App\Models\lecture32;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ModelLecture32 extends Model
{
    protected $table = "laravelweb_users";
    protected $primaryKey = 'user_id';
    protected $field = [
        'user_name',
        'display_name',
        'email',
        'password',
        'address',
        'phone',
    ];
    public $timestamp = false;

    /**
     *  Sử dụng Event
     *  - Luôn luôn khai báo trong hàm booted
     */
    protected static function booted()
    {
        static::retrieved(function ($user) {
            Log::info("Lấy dữ liệu thành công"); // Logs được ghi vào /storage/logs
            /**
             *  Chạy log dươi terminal:
             *      - Linux - Docker: 
             *          $ docker exec -it Laravel-App bash
             *          $ tail -f storage/logs/laravel.log
             *      - Window:
             *          $ cd .\Laravel-Learning\
             *          $ Get-Content storage/logs/laravel.log -Wait -Tail 30 -Encoding UTF8
             */
        });
    }
}
