<?php

namespace App\Models\lecture12; // Khi move file tới subfolder-> sửa lại namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model as Model; // sử lib thường nếu dùng class model thường (extends Model) 
use Illuminate\Foundation\Auth\User as Auth; // sử lib Auth nếu model nhằm mục đích Authentication (extends Auth) 

class ModelLecture12 extends Auth // Khi rename file -> sửa lại tên class
{
    use HasFactory;

    /**
     * truy xuất database với các biến mặc định
     * 
     */
    protected $table = 'laravelweb_users';
    protected $primaryKey = 'user_id';
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
    public $timestamps = false;

    public function get_info()
    {
        return 'call from  model';
    }
}
