<?php

namespace App\Models\lecture26;

use Illuminate\Database\Eloquent\Model;

use App\Scopes\UsersScope;

class ModelLecture26 extends Model
{
    protected $table = "laravelweb_users";
    protected $primaryKey = 'user_id';
    protected $field = [
        'user_name',
        'display_name',
        'email',
        'password',
        'address',
        'phone',
    ];
    public $timestamp = false;

    /**
     *  Local scope: 
     *  - Đặt tên scope luôn luôn có từ scope đầu tiên
     */
    public static function scopeCountUser($query){
        return $query->count('user_id'); 
    }

    /**
     *  Sử dụng Global Scope
     *  - Luôn luôn khai báo trong hàm booted
     *  - Global Scope sẽ mặc định luôn luôn thực thi scope này nều bắt query nào chạy tới
     *  - Để loại bỏ Scope này chay: Model::withoutGlobalScope(Scope::class)
     */
    protected static function booted(){
        // Sử dụng scope class
        static::addGlobalScope(new UsersScope());

        /**
         *  Sử dụng anonymous global scope.
         *  - Truyền vào phương thức addGlobalScope như 1 dạng closure
         *  - Để loại bỏ Scope này chạy: Model::withoutGlobalScope('[tên scope]')
         */
        // static::addGlobalScope('ClosureScope', function($builder){
        //     return $builder->whereNotNull('created_at');
        // });
    }
}