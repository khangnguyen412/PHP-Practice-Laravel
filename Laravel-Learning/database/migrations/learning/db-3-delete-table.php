<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        /**
         *  - Ngắt các khoá ngoại trước khi xoá bảng
         */
        Schema::disableForeignKeyConstraints(); 

        /**
         *  - Xoá bảng
         */ 
        // Schema::drop(''); 

        /**
         *  - Hoặc dùng xoá bảng nếu tồn tại
         */ 
        Schema::dropIfExists(''); 
        // Schema::dropIfExists('PersonCountry'); 
        // Schema::dropIfExists('Country'); 
        // Schema::dropIfExists('Passport'); 
        // Schema::dropIfExists('Visa'); 
        // Schema::dropIfExists('Person'); 

        /**
         *  - Kết nối lại các khoá ngoai sau khi xoá bảng
         */ 
        Schema::enableForeignKeyConstraints(); 
    }
}

?>