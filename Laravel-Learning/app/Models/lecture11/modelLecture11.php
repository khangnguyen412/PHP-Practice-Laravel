<?php

namespace App\Models\lecture11; // Khi move file tới subfolder-> sửa lại namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLecture11 extends Model
{
    use HasFactory;

    // Khai báo các bảng được sử dụng trong model
    protected $accountTable = 'account';

    /**
     * Khai báo lọc cột dữ liệu: 
     * - Chỉ lấy những thông số cần truy xuất trên một bảng
     */
    protected $fillable = ['ACCOUNT_ID', 'AVAIL_BALANCE', 'CLOSE_DATE'];

    /**
     * Khai báo timestamps
     * - Cho phép laravel tự động cập nhật các cột 'created_at' và 'updated_at'
     */
    public $timestamps = true;
}
