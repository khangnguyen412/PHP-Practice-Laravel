<?php

namespace App\Models\lecture12; // Khi move file tới subfolder-> sửa lại namespace

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLecture12 extends Model // Khi rename file -> sửa lại tên class
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
