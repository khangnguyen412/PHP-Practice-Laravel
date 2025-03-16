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
        Schema::dropIfExists('account_level');
        /**
         *  - Các thuộc tính của bảng: ./Laravel-Learning/routes/learning/part-8-schema-builder.php
         */
        Schema::create('account_level', function(Blueprint $table){
            $table->engine = 'InnoDB'; // Thêm tham số này cấu hình bảng, để kết nối khóa ngoài lúc sử dụng host
            $table->unsignedBigInteger('level_id');
            $table->integer('account_id');
            $table->timestamp('assigned_at')->nullable();
            $table->primary(['account_id', 'level_id']); // Khóa chính kép
            /**
             *  - onDelete("[kiểu]"): tự động xóa các bản ghi liên quan trên bảng con khi bản ghi cha bị xóa.
             *  - Ví dụ: khi trên bảng cha xóa dữ có id = 3 ->  thì bảng con cũng xóa các data có id = 3
             *  - Có các tham số của onDelete():
             *      + cascade: Xóa tất cả bản ghi con khi bản ghi cha bị xóa
             *      + set null: Đặt khóa ngoại thành NULL nếu bản ghi cha bị xóa
             *      + restrict: Ngăn không cho xóa nếu vẫn có bản ghi con liên kết
             *      + no action: Không làm gì khi bản ghi cha bị xóa
             */
            $table->foreign('level_id')->references('level_id')->on('level')->onDelete('cascade');
            $table->foreign('account_id')->references('account_id')->on('account')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints(); 
    }
    public function down() {
        Schema::dropIfExists('account_level');
    }
}
?>