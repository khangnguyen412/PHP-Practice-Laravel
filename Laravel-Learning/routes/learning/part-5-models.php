<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;

/******************* lecture 11: Model trong Laravel ****************************/
/**
 *  Model được dặt ở trong thư mục /app
 * 
 *  Để tạo tự động 1 model áp dụng 1 trong 2 lệnh sau:
 *      $ php artisan make:model [sub folder]\[model name]
 *      $ php artisan make:model [sub folder]\[model name] --migration
 *  Trong đó: 
 *      - [model name] là tên của model được tạo
 *      - [sub folder] tên đường dẫn hoặc folder
 * 
 *  Khai báo các thông số tùy chỉnh: trong file ../app/Models/Lecture11.php
 */
