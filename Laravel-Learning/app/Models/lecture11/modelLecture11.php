<?php

namespace App\Models\lecture11; // Khi move file tới subfolder-> sửa lại namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLecture11 extends Model
{
    use HasFactory;

    /**
     *  Khai báo các bảng được sử dụng trong model
     */
    // 
    protected $table = 'laravelweb_users';

    /**
     *  Khai báo khóa chính (nêu tên khóa chính ko phải id)
     */
    protected $primaryKey = 'user_id';

    /**
     *  Khai báo lọc cột dữ liệu: 
     *  - Chỉ lấy những thông số cần truy xuất trên một bảng
     */
    protected $fillable = [
        'user_name',
        'display_name',
        'email',
        'password',
        'address',
        'phone',
        'created_at',
        'updated_at'
    ];

    /**
     *  Khai báo timestamps
     *  - Cho phép laravel tự động cập nhật các cột 'created_at' và 'updated_at'
     */
    public $timestamps = true;
}
