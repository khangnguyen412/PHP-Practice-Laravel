<?php

namespace App\Models\lecture13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

/**
 * Eloquent relationships One to One
 * Bảng person vs passport: 1-1
 */
class ModelLecture13Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'cust_id'; // thêm tham số này nếu gặp lỗi: Unknown column 'customer.id' in 'on clause' vì mặc định tên cột là id
    /**
     * Mặc định primary key là id
     * => nếu muốn thay đổi tên => set up lại $primaryKey cho class
     */
    protected $field = [
        'cust_id',
        'address',
        'city',
        'cust_type_cd',
        'fed_id',
        'postal_code',
        'state'
    ];
    public $timestamp = false;

    public function individual()
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
        return $this->hasOne(ModelLecture13Individual::class, 'cust_id', 'cust_id');
    }

    public function officer()
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
        return $this->hasMany(ModelLecture13Officer::class, 'cust_id', 'cust_id');
    }
}
