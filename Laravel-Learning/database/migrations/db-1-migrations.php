<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     *  Một class Migration có hai hàm cơ bản up() down()
     *  Up(): thực hiện chức năng thao tác với database
     *  Down(): thực hiện tượng rollback (thực thi sau khi hàm up() hoàn thành)
     */
    public function up(){}
    public function down(){}
}

?>