<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(){
        Schema::disableForeignKeyConstraints(); // Ngắt các khoá ngoai trước khi xoá bảng
        // Schema::drop(''); // Xoá bảng
        // Schema::dropIfExists(''); // Xoá bảng nếu tồn tại
        Schema::enableForeignKeyConstraints(); // Kết nối lại các khoá ngoai sau khi xoá bảng
    }
}

?>