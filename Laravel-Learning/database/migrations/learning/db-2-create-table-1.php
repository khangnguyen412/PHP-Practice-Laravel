<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

new class extends Migration {
    public function up() {
        /**
         *  - Drop bảng nếu tồn tại
         */
        Schema::dropIfExists('name_table');

        /**
         *  - Các thuộc tính của bảng: ./Laravel-Learning/routes/learning/part-8-schema-builder.php
         */
        Schema::create('name_table', function(Blueprint $table){
            $table->id('name_column');
            $table->text('name')->nullable(false);
            $table->text('description')->nullable();
            $table->timestamps(); // tự tạo ra thuộc tính create_at và update_at
        });
    }
    public function down() {
        Schema::dropIfExists('name_table');
    }
}
?>