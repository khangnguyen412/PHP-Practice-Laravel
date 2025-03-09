<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     *  Một class Migration có hai hàm cơ bản up() down()
     *  Up(): thực hiện chức năng tạo hoặc chỉnh sửa bảng với database
     *      $ php artisan migrate
     *      $ php artisan migrate --path=./database/migrations/[file-name].php
     *  Down(): thực hiện rollback, trở về nguyên hiện trạng trc khi hàm up() thực thi (xử lý lỗi khi chạy up())
     *      $ php artisan migrate:rollback
     *      $ php artisan migrate:rollback --step=2 (quay lại một số bước migration)
     */
    public function up(){}
    public function down(){}
}

?>