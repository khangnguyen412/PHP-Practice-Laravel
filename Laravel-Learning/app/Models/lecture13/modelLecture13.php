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
class modelLecture13 extends Model
{
    protected $table = "Person";
    protected $primaryKey = 'PersonID';
    /**
     * Mặc định primary key là id
     * => nếu muốn thay đổi tên => set up lại $primaryKey cho class
     */
    protected $field = [
        'PersonID',
        'FirstName',
        'LastName',
        'DateOfBirth',
    ];
    public $timestamp = false;

    public function Passport()
    {
        return $this->hasOne('\App\Models\lecture13\modelLecture13_2', 'PersonID');
        /**
         * hasOne($related, $foreignKey): quan hệ 1 - 1
         * $related: đường dẫn của [namespace hiện tại]\[class của bảng liên kết đối diện]\
         * $foreignKey: tên khóa ngoại của bảng
         */
    }
    public function Visa()
    {
        return $this->hasMany('\App\Models\lecture13\modelLecture13_3', 'PersonID');
        /**
         * hasMany($related, $foreignKey): quan hệ 1 - n
         * $related: đường dẫn của [namespace hiện tại]\[class của bảng liên kết đối diện]\
         * $foreignKey: tên khóa ngoại của bảng
         */
    }
    public function Country()
    {
        return $this->belongsToMany('\App\Models\lecture13\modelLecture13_4', 'PersonCountry', 'PersonID', 'CountryID');
        /**
         * belongsToMany($related, $table, $foreignKey, $relatedKey): quan hệ n - n
         * $related: đường dẫn của [namespace hiện tại]\[class của bảng liên kết đối diện]\
         * $table: tên bảng trung gian
         * $foreignKey: tên khóa ngoại của bảng n thứ 1
         * $relatedKey: tên khóa ngoại của bảng n thứ 2
         */
    }
}

/**
 * Eloquent relationships One to One
 * Bảng person - Passport: 1-1
 */
class modelLecture13_2 extends Model
{
    use HasFactory;
    protected $table = 'Passport';
    protected $field = [
        'PassportID',
        'PassportNumber',
        'IssueDate',
        'ExpiryDate',
        'PersonID',
    ];
    public $timestamp = false;

    public function Person()
    {
        return $this->belongsTo('\App\Models\lecture13\modelLecture13');
    }
}


/**
 * Eloquent relationships One to Many
 * Bảng person - visa: 1-n
 */
class modelLecture13_3 extends Model
{
    use HasFactory;
    protected $table = 'Visa';
    protected $field = [
        "VisaID",
        "visaNumber",
        "Country",
        "IssueDate",
        "ExpiryDate",
    ];
    public function Person()
    {
        return $this->belongsTo('\App\Models\lecture13\modelLecture13');
    }
}

/**
 * Eloquent relationships Many to Many
 * Bảng person - country: n-n
 */
class modelLecture13_4 extends Model
{
    use HasFactory;
    protected $table = 'Country';
    protected $primaryKey = 'CountryID'; // thêm tham số này nếu gặp lỗi: Unknown column 'Country.id' in 'on clause' vì mặc định tên cột là id
    protected $field = [
        "CountryID",
        "CountryName",
    ];
    public function Person() {
        return $this->belongsToMany('\App\Models\lecture13\modelLecture13', 'PersonCountry', 'CountryID', 'PersonID');
    }
}
