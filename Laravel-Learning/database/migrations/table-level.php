<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        /**
         *  - Drop bảng nếu tồn tại
         */
        Schema::disableForeignKeyConstraints(); 
        Schema::dropIfExists('level');

        /**
         *  - Các thuộc tính của bảng: ./Laravel-Learning/routes/learning/part-8-schema-builder.php
         */
        Schema::create('level', function(Blueprint $table){
            $table->engine = 'InnoDB'; // Thêm tham số này cấu hình bảng, để kết nối khóa ngoài lúc sử dụng host
            $table->id('level_id');
            $table->text('name')->nullable(false);
            $table->text('description')->nullable();
            $table->timestamps(); // tự tạo ra thuộc tính create_at và update_at
        });
        Schema::enableForeignKeyConstraints(); 
    }
    public function down() {
        Schema::dropIfExists('level');
    }
}
?>