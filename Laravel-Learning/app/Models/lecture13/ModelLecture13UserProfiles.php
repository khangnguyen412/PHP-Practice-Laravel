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
class ModelLecture13UserProfiles extends Model
{
    protected $table = 'laravelweb_user_profiles';
    protected $primaryKey = 'profile_id';
    protected $field = [
        'user_id',
        'bio',
        'avatar',
        'created_at',
        'updated_at',
    ];
    public $timestamp = false;

    public function users()
    {
        /**
         * - Quan hệ 1 - n:
         *      $ belongsTo($related):
         * - Hoặc:
         *      $ belongsTo($related, $foreignKey = null, $ownerKey = null)
         * - Trong đó
         *      related: đường dẫn của [namespace hiện tại]\[class liên kết của bảng cha] hoặc tên class
         *      foreignKey: tên khóa ngoại của bảng
         *      ownerKey: khoá chính của bảng cha
         */
        return $this->belongsTo(ModelLecture13Users::class, 'user_id', 'user_id');
    }
}
