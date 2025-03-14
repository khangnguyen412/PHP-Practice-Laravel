<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 

use App\Models\Lecture13\ModelLecture13Level;

class DatabaseSeederLevel extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         *  - Tạo seeding thủ công
         */
        ModelLecture13Level::create([
            'name' => 'Gold',
            'description' => 'Discount 50%'
        ]);
        ModelLecture13Level::create([
            'name' => 'Gold',
            'description' => 'Discount 60%'
        ]);
        ModelLecture13Level::create([
            'name' => 'Platium',
            'description' => 'Discount 70%'
        ]);

        /**
         *  - Tạo seeding tự động (ko khuyển khích dung vì hay có lỗi từ ràng buộc của bảng)
         */
        // model_lecture13_level::factory()->create();

        /**
         *  - Tạo Seeding gốc: lệnh db tạo trực tiếp
         *  - Cần khai báo thư viện Support\Facades\DB và \Support\Str
         */
        DB::table('level')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10),
        ]);
    }
}
