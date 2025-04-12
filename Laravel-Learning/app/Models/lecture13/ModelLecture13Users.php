<?php

namespace App\Models\lecture13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

/**
 * Eloquent relationships One to One
 * Bảng users vs user_profiles: 1-1
 */
class ModelLecture13Users extends Model
{
    protected $table = 'laravelweb_users';
    /**
     *  - Mặc định primary key là id => nếu muốn thay đổi tên => set up lại $primaryKey cho class
     *  - Thêm tham số $primaryKey nếu gặp lỗi: Unknown column 'laravelweb_users.user_id' in 'on clause' vì mặc định tên cột là id
     */
    protected $primaryKey = 'user_id'; // 
    protected $field = [
        'user_name',
        'display_name',
        'email',
        'password',
        'address',
        'phone ',
    ];
    public $timestamp = false;

    public function user_profiles()
    {
        /**
         * - Quan hệ 1 - 1:
         *      $ hasOne($related, $foreignKey):
         * - Hoặc:
         *      $ hasOne($related, $foreignKey = null, $localKey = null)
         * - Trong đó
         *      related: đường dẫn của [namespace hiện tại]\[class liên kết của bảng con] hoặc tên class
         *      foreignKey: tên khóa ngoại của bảng
         *      localKey: khoá chính của bảng
         */
        return $this->hasOne(ModelLecture13UserProfiles::class, 'user_id', 'user_id');
    }

    public function products()
    {
        /**
         * - Quan hệ 1 - n:
         *      $ hasMany($related, $foreignKey):
         * - Hoặc:
         *      $ hasMany($related, $foreignKey = null, $localKey = null)
         * - Trong đó
         *      related: đường dẫn của [namespace hiện tại]\[class liên kết của bảng con] hoặc tên class
         *      foreignKey: tên khóa ngoại của bảng
         *      localKey: khoá chính của bảng
         */
        return $this->hasMany(ModelLecture13Products::class, 'user_id', 'user_id');
    }
}
