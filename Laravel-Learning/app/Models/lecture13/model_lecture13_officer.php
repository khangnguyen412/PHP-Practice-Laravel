<?php

namespace App\Models\lecture13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

/**
 * Eloquent relationships One to Many
 * Bảng customer - officer: 1-n
 */
class model_lecture13_officer extends Model
{
    protected $table = 'officer';
    protected $primaryKey = 'officer_id';
    protected $field = [
        'officer_id',
        'end_date',
        'first_name',
        'last_name',
        'start_date',
        'title',
        'cust_id',
    ];
    public $timestamp = false;

    public function customer()
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
        return $this->belongsTo(model_lecture13_customer::class, 'cust_id', 'cust_id');
    }
}
