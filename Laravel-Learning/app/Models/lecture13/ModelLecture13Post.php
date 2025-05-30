<?php

namespace App\Models\lecture13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * Eloquent relationships Many to Many
 * Bảng Post vs Categories: n-n
 */
class ModelLecture13Post extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'laravelweb_posts';
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'body',
        'canonical_url',
        'user_id',
        'created_at',
        'updated_at',
    ];
    public $timestamp = false;

    public function categories()
    {
        /**
         *  belongsToMany($related, $table, $foreignKey, $relatedKey): quan hệ n - n
         *  $related: đường dẫn của [namespace hiện tại]\[class liên kết của bảng cha còn lại] hoặc tên class
         *  $table: tên bảng trung gian
         *  $foreignKey: tên khóa ngoại của bảng n thứ 1
         *  $relatedKey: tên khóa ngoại của bảng n thứ 2
         */
        return $this->belongsToMany(
            ModelLecture13Categories::class,
            'laravelweb_categories_posts',
            'post_id',
            'category_id'
        );
    }

    public function has_many_through()
    {
        /**
         *  hasManyThrough($related, $through, $firstKey = null, $secondKey = null, $localKey = null, $secondLocalKey = null) 
         *  - Bảng đích: Categories
         *  - Bảng này: Post
         */
        return $this->hasManyThrough(
            ModelLecture13Categories::class,    // Bảng đích cuối cùng bạn muốn lấy
            ModelLecture13CatePost::class,      // Bảng trung gian
            'post_id',                          // Khóa ngoại trên bảng trung gian trỏ đến chính bảng này
            'category_id',                      // Khóa chính trên bảng đích
            'post_id',                          // Khóa chính trên bảng này
            'category_id'                       // Khóa ngoại trên bảng trung gian trỏ đến bảng đích
        );
    }

    public function morph_media()
    {
        /**
         *  Morph lấy cột model_type và model_id để nối với các bảng với nhau
         *  - Ví dụ: để nối bảng này thì model_type của bảng midel phải là App\\Models\\lecture13\\ModelLecture13Post
         */
        return $this->morphMany(ModelLecture13Media::class, 'model');
    }
}
