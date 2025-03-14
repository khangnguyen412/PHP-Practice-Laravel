<?php

namespace App\Models\lecture13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

/**
 * Eloquent relationships Many to Many
 * Bảng account vs level: n-n
 */
class ModelLecture13Account extends Model
{
    use HasFactory;
    protected $table = 'account';
    protected $primaryKey = 'account_id';
    protected $field = [
        'account_id',
        'avail_balance',
        'close_date',
        'last_activity_date',
        'open_date',
        'status',
        'cust_id',
        'open_branch_id',
        'open_emp_id',
        'product_cd',
    ];
    public $timestamp = false;

    public function level()
    {
        /**
         * belongsToMany($related, $table, $foreignKey, $relatedKey): quan hệ n - n
         * $related: đường dẫn của [namespace hiện tại]\[class liên kết của bảng cha còn lại] hoặc tên class
         * $table: tên bảng trung gian
         * $foreignKey: tên khóa ngoại của bảng n thứ 1
         * $relatedKey: tên khóa ngoại của bảng n thứ 2
         */
        return $this->belongsToMany(ModelLecture13Level::class, 'account_level', 'account_id', 'level_id');
    }
}