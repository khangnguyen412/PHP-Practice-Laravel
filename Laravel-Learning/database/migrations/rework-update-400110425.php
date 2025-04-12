<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Schema::table('laravelweb_categories', function(Blueprint $table){
        //     $table->renameColumn('post-type', 'post_type');
        // });

        // Schema::disableForeignKeyConstraints();
        // Schema::dropIfExists('laravelweb_user_profiles');
        // Schema::create('laravelweb_user_profiles', function (Blueprint $table) {
        //     $table->engine = 'InnoDB';
        //     $table->id('profile_id');
        //     $table->unsignedBigInteger('user_id')->unique(); // Đảm bảo 1-1
        //     $table->string('bio')->nullable();
        //     $table->string('avatar')->nullable();
        //     $table->timestamps();
        //     $table->foreign('user_id')->references('user_id')->on('laravelweb_users')->onDelete('cascade');
        // });
        // Schema::enableForeignKeyConstraints();
    }
    public function down() {
        // Schema::table('laravelweb_categories', function(Blueprint $table){
        //     $table->renameColumn('post_type', 'post-type');
        // });
        
        // Schema::dropIfExists('laravelweb_user_profiles');
    }
};
