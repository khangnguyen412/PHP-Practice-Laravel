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
            $table->id('id_table');
            $table->unsignedBigInteger('col_1'); // Phải đúng kiểu dữ liệu của bảng cha thứ nhất
            $table->unsignedBigInteger('col_2'); // Phải đúng kiểu dữ liệu của bảng cha thứ hai
            $table->timestamp('')->nullable();
            $table->primary(['col_1', 'col_2']); // Khóa chính kép
            /**
             *  - onDelete("[kiểu]"): tự động xóa các bản ghi liên quan trên bảng con khi bản ghi cha bị xóa.
             *  - Ví dụ: khi trên bảng cha xóa dữ có id = 3 ->  thì bảng con cũng xóa các data có id = 3
             *  - Có các tham số của onDelete():
             *      + cascade: Xóa tất cả bản ghi con khi bản ghi cha bị xóa
             *      + set null: Đặt khóa ngoại thành NULL nếu bản ghi cha bị xóa
             *      + restrict: Ngăn không cho xóa nếu vẫn có bản ghi con liên kết
             *      + no action: Không làm gì khi bản ghi cha bị xóa
             */
            $table->foreign('col_1')->references('id_table_1')->on('table_1')->onDelete('cascade');
            $table->foreign('col_2')->references('id_table_2')->on('table_2')->onDelete('cascade');
        });
    }
    public function down() {
        Schema::dropIfExists('name_table');
    }
}
?>