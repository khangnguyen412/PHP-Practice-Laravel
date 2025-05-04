<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


/******************* Lecture 15 16: Schema builder  ****************************/
/**
 *  - Xây dưng database bằng migrations (thực hiện trong Laravel-Learning/database/migrations)
 *  - Tạo Migrations:
 *      $ php artisan make:migration [file-name] --create=[talbe-name]
 *  - Các thuộc tính của bảng: https://laravel.com/docs/9.x/migrations#available-column-types
 *  - Tạo ràng buộc: https://laravel.com/docs/9.x/migrations#creating-indexes
 *  - Bắt khóa ngoại: https://laravel.com/docs/9.x/migrations#foreign-key-constraints
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

/******************* Lecture 17: Seeder  ****************************/
/**
 *  - Seeder có tác dụng dump các data mẫu để kiểm thử ứng dụng hoặc khởi tạo dữ liệu ban đầu 
 *  - Tạo Seeder:
 *      $ php artisan make:seeder [Tên-Class]
 *  - Import models muốn dump db
 *  - Dump thủ công: 
 *      [models-name]::create([
 *          'col-name' => 'value',
 *      ]);
 *  - Dump tự động (nhiều lỗi phải chạy lại migrations):
 *      [models-name]::factory()->create();
 *  * Lưu ý: dump tự động sẽ có lỗi nếu models ko sử dụng hasfactory
 *  - Import lib và thêm vào models:
 *      $ use HasFactory;
 *  - Dùng lệnh tạo factory theo tên và đường dẫn của models:
 *      $ php artisan make:factory [đường-dẫn]/[tên-file-models]Factory --model=App\Models\[đường-dẫn]\[tên-file-models]
 *  - Sau cùng gọi class trong file DatabaseSeeder.php, chạy:
 *      $ php artisan db:seed
 *  - Seeding của bảng pivot: xem trong Laravel-Learning/database/seeders/DatabaseSeederAcountLevel.php
 */