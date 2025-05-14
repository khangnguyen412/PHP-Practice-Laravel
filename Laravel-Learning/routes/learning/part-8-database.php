<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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




/**********************************************************************/
/**********************************************************************/
/******************* Laravel 8.0 (bổ sung) ****************************/
/**********************************************************************/
/**********************************************************************/

/****************** Lecture 24: DB  ***********************************/
/**
 *  Select Database
 */
Route::get('/db-select-test', function () {
    $user = DB::select('SELECT * FROM laravelweb_users WHERE user_id = ?', [1]);
    return response()->json(['data' => $user], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Insert Database
 */
Route::get('/db-insert-test', function () {
    DB::insert(
        'INSERT INTO laravelweb_pages (title, slug, meta_title, meta_description, body, canonical_url, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, ?)',
        [
            'Testimonials Test',
            'testimonials-test',
            'Testimonials',
            'What our clients say',
            'This is the testimonials page...',
            'https://example.com/testimonials',
            3,
            now(),
            now()
        ]
    );
    $user = DB::select('select * from laravelweb_pages');
    return response()->json(['data' => $user], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Update Database
 */
Route::get('/db-update-test', function () {
    DB::update('UPDATE laravelweb_pages SET user_id = 4 WHERE slug = "testimonials-test"');
    $user = DB::select('select * from laravelweb_pages');
    return response()->json(['data' => $user], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Delete Database
 */
Route::get('/db-delete-test', function () {
    DB::delete('DELETE FROM laravelweb_pages WHERE slug = "testimonials-test"');
    $user = DB::select('select * from laravelweb_pages');
    return response()->json(['data' => $user], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Database Transaction
 *     - Giúp thực hiện nhiều thao tác cơ sở dữ liệu như một khối thống nhất 
 *     - Đảm bảo rằng tất cả thành công hoặc tất cả thất bại
 */
Route::get('/db-transaction-test', function () {
    DB::beginTransaction();
    try {
        DB::insert(
            'INSERT INTO laravelweb_pages (title, slug, meta_title, meta_description, body, canonical_url, user_id, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?, ?)',
            [
                'Testimonials Test',
                'testimonials-test',
                'Testimonials',
                'What our clients say',
                'This is the testimonials page...',
                'https://example.com/testimonials',
                3,
                now(),
                now()
            ]
        );
        DB::update('UPDATE laravelweb_pages SET user_id = 4 WHERE slug = "testimonials-test"');
        DB::delete('DELETE FROM laravelweb_pages WHERE slug = "testimonials-test"');
        DB::commit();
        $user = DB::select('select * from laravelweb_pages');
        return response()->json(['data' => $user], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        DB::rollBack();
        throw $e;
    };
});
