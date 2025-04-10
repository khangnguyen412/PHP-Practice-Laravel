<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        /**
         *  $ php artisan migrate --path=./database/migrations/drop-all-table.php
         */
        Schema::disableForeignKeyConstraints(); 
        Schema::dropIfExists('acc_transaction');
        Schema::dropIfExists('account');
        Schema::dropIfExists('branch');
        Schema::dropIfExists('business');
        Schema::dropIfExists('customer');
        Schema::dropIfExists('department');
        Schema::dropIfExists('employee');
        Schema::dropIfExists('individual');
        Schema::dropIfExists('officer');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_type');
        Schema::dropIfExists('account_level');
        Schema::dropIfExists('level');
        Schema::enableForeignKeyConstraints(); 
    }
    public function down() {}
}
?>