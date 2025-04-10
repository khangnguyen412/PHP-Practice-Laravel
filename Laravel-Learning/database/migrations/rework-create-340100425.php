<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Schema::defaultStringLength(191);
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


        /**
         *  - Bảng laravelweb_pages
         *  - Các mối liên hệ:
         *      laravelweb_users (1-n)
         *      laravelweb_page_meta (1-n)
         */
        Schema::create('laravelweb_pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('page_id');
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('body');
            $table->string('canonical_url')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('laravelweb_users')->onDelete('cascade');
        });

        /**
         *  - Bảng laravelweb_posts
         *  - Các mối liên hệ:
         *      laravelweb_users (1-n)
         *      laravelweb_categories (n-n)
         *      laravelweb_tags (n-n)
         *      laravelweb_post_meta (1-n)
         */
        Schema::create('laravelweb_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('post_id');
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->longText('body');
            $table->string('canonical_url')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('laravelweb_users')->onDelete('cascade');
        });

        /**
         *  - Bảng laravelweb_products
         *  - Các mối liên hệ:
         *      laravelweb_users (1-n)
         *      laravelweb_product_categories(1-n)
         *      laravelweb_product_meta(1-n)
         */
        Schema::create('laravelweb_products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('product_id');
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('laravelweb_users')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('laravelweb_categories')->onDelete('set null');
            $table->timestamps();
        });

        /**
         *  - Bảng laravelweb_categories
         *  - Các mối liên hệ:
         *      laravelweb_posts (n-n) (bảng: trung gian laravelweb_categories_posts) 
         *      laravelweb_products (1-n)
         */
        Schema::create('laravelweb_categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('category_id');
            $table->string('name');
            $table->string('post_type');
            $table->string('slug')->unique()->index();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        /**
         *  - Bảng categories_posts
         *  - Các mối liên hệ: bảng trung gian cho laravelweb_categories - laravelweb_posts
         */
        Schema::create('laravelweb_categories_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('post_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('post_id')->references('post_id')->on('laravelweb_posts')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('laravelweb_categories')->onDelete('cascade');
            $table->primary(['category_id', 'post_id']);
        });

        /**
         *  - Bảng laravelweb_tags
         *  - Các mối liên hệ:
         *      laravelweb_posts (n-n)
         */
        Schema::create('laravelweb_tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('tag_id');
            $table->string('name');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        /**
         *  - Bảng categories_posts
         *  - Các mối liên hệ: bảng trung gian cho laravelweb_tags - laravelweb_posts
         */
        Schema::create('laravelweb_tags_posts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('tag_id')->index();
            $table->unsignedBigInteger('post_id')->index();
            $table->foreign('tag_id')->references('tag_id')->on('laravelweb_tags')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('laravelweb_posts')->onDelete('cascade');
            $table->primary(['post_id', 'tag_id']);
        });

        /**
         *  - Bảng media
         *  - Các mối liên hệ: post, product (morph)
         */
        Schema::create('laravelweb_media', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('media_id');
            $table->string('model_type', 191)->index(); // Giữ độ dài mặc định 255
            $table->unsignedBigInteger('model_id');
            $table->string('collection_name');
            $table->string('file_name');
            $table->string('mime_type')->nullable();
            $table->string('disk');
            $table->string('conversions_disk')->nullable();
            $table->unsignedBigInteger('size');
            $table->json('manipulations');
            $table->json('custom_properties');
            $table->json('generated_conversions');
            $table->json('responsive_images');
            $table->unsignedInteger('order_column')->nullable()->index();
            $table->string('alt_text')->nullable();
            $table->timestamps();
            $table->index(['model_type', 'model_id'], 'model_type_model_id_index');
        });

        /**
         *  - Bảng users
         *  - Các mối liên hệ:
         *      laravelweb_posts (1-n)
         *      laravelweb_products (1-n)
         *      laravelweb_roles (n-n)
         *      laravelweb_permissions (n-n)
         */
        Schema::create('laravelweb_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('user_id');
            $table->string('user_name');
            $table->string('display_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->string('phone');
            $table->timestamps();
        });

        /**
         *  - Bảng roles
         *  - Các mối liên hệ:
         *      laravelweb_users (n-n)
         *      laravelweb_permissions (n-n)
         */
        Schema::create('laravelweb_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('role_id');
            $table->string('name')->unique();
            $table->string('guard_name');
            $table->timestamps();
        });

        /**
         *  - Bảng permissions
         *  - Các mối liên hệ:
         *      laravelweb_users (n-n)
         *      laravelweb_roles (n-n)
         */
        Schema::create('laravelweb_permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('permission_id');
            $table->string('name')->unique();
            $table->string('guard_name');
            $table->timestamps();
        });

        /**
         *  - Bảng laravelweb_model_has_permissions
         *  - Các mối liên hệ: bảng trung gian cho laravelweb_users - laravelweb_permissions
         */
        Schema::create('laravelweb_model_has_permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('permission_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->index(['model_id', 'model_type'], 'model_has_permissions_model_id_model_type_index');
            $table->foreign('permission_id')->references('permission_id')->on('laravelweb_permissions')->onDelete('cascade');
            $table->primary(['permission_id', 'model_id', 'model_type']);
        });

        /**
         *  - Bảng laravelweb_model_has_roles
         *  - Các mối liên hệ: bảng trung gian cho laravelweb_users - laravelweb_roles
         */
        Schema::create('laravelweb_model_has_roles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('role_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');
            $table->index(['model_id', 'model_type'], 'model_has_roles_model_id_model_type_index');
            $table->foreign('role_id')->references('role_id')->on('laravelweb_roles')->onDelete('cascade');
            $table->primary(['role_id', 'model_id', 'model_type']);
        });

        /**
         *  - Bảng laravelweb_role_has_permissions
         *  - Các mối liên hệ: bảng trung gian cho laravelweb_roles - laravelweb_permissions
         */
        Schema::create('laravelweb_role_has_permissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('permission_id')->references('permission_id')->on('laravelweb_permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('laravelweb_roles')->onDelete('cascade');
            $table->primary(['permission_id', 'role_id']);
        });

        /**
         *  - Bảng laravelweb_page_meta
         *  - Các mối liên hệ:
         *      laravelweb_pages (1-n r)
         */
        Schema::create('laravelweb_page_meta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('page_meta_id');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('page_id')->on('laravelweb_pages')->onDelete('cascade');
            $table->string('meta_key')->index();
            $table->text('meta_value')->nullable();
            $table->timestamps();
        });

        /**
         *  - Bảng laravelweb_post_meta
         *  - Các mối liên hệ:
         *      laravelweb_posts (1-n r)
         */
        Schema::create('laravelweb_post_meta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('post_meta_id');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('post_id')->on('laravelweb_posts')->onDelete('cascade');
            $table->string('meta_key')->index();
            $table->text('meta_value')->nullable();
            $table->timestamps();
        });

        /**
         *  - Bảng laravelweb_product_meta
         *  - Các mối liên hệ:
         *      laravelweb_products (1-n r)
         */
        Schema::create('laravelweb_product_meta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('product_meta_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('laravelweb_products')->onDelete('cascade');
            $table->string('meta_key')->index();
            $table->text('meta_value')->nullable();
            $table->timestamps();
        });


        /**
         *  - Bảng
         */
        // Schema::create('', function (Blueprint $table) {});

        Schema::enableForeignKeyConstraints();
    }
    public function down()
    {
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
