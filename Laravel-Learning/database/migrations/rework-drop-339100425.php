<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        /**
         *  - Drop bảng nếu tồn tại
         */
        Schema::dropIfExists('laravelweb_pages');
        Schema::dropIfExists('laravelweb_posts');
        Schema::dropIfExists('laravelweb_products');
        Schema::dropIfExists('laravelweb_categories');
        Schema::dropIfExists('laravelweb_categories_posts');
        Schema::dropIfExists('laravelweb_tags');
        Schema::dropIfExists('laravelweb_tags_posts');
        Schema::dropIfExists('laravelweb_media');
        Schema::dropIfExists('laravelweb_users');
        Schema::dropIfExists('laravelweb_roles');
        Schema::dropIfExists('laravelweb_permissions');
        Schema::dropIfExists('laravelweb_model_has_permissions');
        Schema::dropIfExists('laravelweb_model_has_roles');
        Schema::dropIfExists('laravelweb_role_has_permissions');
        Schema::dropIfExists('laravelweb_page_meta');
        Schema::dropIfExists('laravelweb_post_meta');
        Schema::dropIfExists('laravelweb_product_meta');
    }
};
