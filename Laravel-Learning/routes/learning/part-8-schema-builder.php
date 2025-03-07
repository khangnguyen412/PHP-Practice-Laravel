<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


/******************* lecture 15: Schema builder  ****************************/
/**
 *  - Xây dưng database bằng migrations (thực hiện trong Laravel-Learning/database/migrations)
 *  - Chạy câu lệnh:
 *      $ php artisan migrate --path=./database/migrations/[file-name].php
 *  - Lệnh trên thực hiện đúng [file-name].php ko tự động generate hoặc exec các file khác
 *  - Các lệnh của schema:: chỉ thực hiện trong ./database/migrations/
 *  - Khi tạo class chạy migrate thực hiện cú pháp như sau
 *      $ return new class extends Migration{}
 *  * Lưu ý: ko đặt tên class (hay lỗi xuất hiện tình trạng trùng tên)
 *  - Khi chạy migration, laravel sẽ tự generate bảng migrations để ghi log các file đã chạy
 *  - Nếu thực thi các file có trong log rồi -> xuất hiện tb: Nothing to migrate.
 *  - Muốn chạy lại vào db xoá bản migrations
 */