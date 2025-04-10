<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('laravelweb_categories', function(Blueprint $table){
            $table->renameColumn('post-type', 'post_type');
        });
    }
    public function down(){
        Schema::table('laravelweb_categories', function(Blueprint $table){
            $table->renameColumn('post_type', 'post-type');
        });
    }
};
