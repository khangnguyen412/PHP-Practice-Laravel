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
class model_lecture13_customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'cust_id';
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
        return $this->hasOne(model_lecture13_individual::class, 'cust_id', 'cust_id');
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
        return $this->hasMany(model_lecture13_officer::class, 'cust_id', 'cust_id');
    }

    // public function Country()
    // {
    //     return $this->belongsToMany('\App\Models\lecture13\modelLecture13_4', 'PersonCountry', 'PersonID', 'CountryID');
    //     /**
    //      * belongsToMany($related, $table, $foreignKey, $relatedKey): quan hệ n - n
    //      * $related: đường dẫn của [namespace hiện tại]\[class của bảng liên kết đối diện]\
    //      * $table: tên bảng trung gian
    //      * $foreignKey: tên khóa ngoại của bảng n thứ 1
    //      * $relatedKey: tên khóa ngoại của bảng n thứ 2
    //      */
    // }
}

/**
 * Eloquent relationships Many to Many
 * Bảng person - country: n-n
 */
// class modelLecture13_4 extends Model
// {
//     use HasFactory;
//     protected $table = 'Country';
//     protected $primaryKey = 'CountryID'; // thêm tham số này nếu gặp lỗi: Unknown column 'Country.id' in 'on clause' vì mặc định tên cột là id
//     protected $field = [
//         "CountryID",
//         "CountryName",
//     ];
//     public function Person() {
//         return $this->belongsToMany('\App\Models\lecture13\modelLecture13', 'PersonCountry', 'CountryID', 'PersonID');
//     }
// }
