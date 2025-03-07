<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::dropIfExists('Users'); // Drop bảng nếu tồn tại
        Schema::create('Users', function(Blueprint $table){
            $table->bigIncrements('id')->nullable(false);
            $table->text('name')->nullable(false);
        });
    }
    public function down() {
        
    }
}
?>