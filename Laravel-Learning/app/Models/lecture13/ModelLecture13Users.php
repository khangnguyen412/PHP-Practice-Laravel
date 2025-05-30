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
        'phone',
    ];
    protected $appends = ['full_name'];
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

    /**
     *  Accessors
     *  - Để đưa được thuộc tính ảo này vào Json (sủ dụng cho API) => khai báo thêm protected $appends = [''] ỏ trên
     *  - Cách đặt tên hàm và gọi: get{TênThuộcTính}Attribute()
     */
    public function getFullNameAttribute(){ // Cách gọi $user->full_name
        return ucfirst($this->user_name)." accessors added";
    }

    /**
     *  Mutators là gì?
     *  - Cho phép bạn thay đổi giá trị trước khi lưu vào CSDL 
     *  Khi nào nên dùng?
     *  - Bạn cần xử lý dữ liệu trước khi lưu
     *  - Không muốn logic này nằm trong controller
     */
    
    /**
     *  Casts là gì?
     *  - Dùng để tự động chuyển đổi kiểu dữ liệu khi lấy hoặc lưu vào CSDL
     *  Khi nào nên dùng?
     *  - Dữ liệu trong DB không đúng kiểu bạn muốn ở code (ví dụ: JSON, boolean) 
     *  - Muốn tự động format ngày tháng, số,...
     *  - Tránh phải xử lý thủ công mỗi lần truy vấn
     */
    // protected $casts = [
    //     'is_admin' => 'boolean',
    //     'options' => 'array',
    //     'meta' => 'json',
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    // ];
}
