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
    use SoftDeletes;
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
         * belongsToMany($related, $table, $foreignKey, $relatedKey): quan hệ n - n
         * $related: đường dẫn của [namespace hiện tại]\[class liên kết của bảng cha còn lại] hoặc tên class
         * $table: tên bảng trung gian
         * $foreignKey: tên khóa ngoại của bảng n thứ 1
         * $relatedKey: tên khóa ngoại của bảng n thứ 2
         */
        return $this->belongsToMany(ModelLecture13Categories::class, 'laravelweb_categories_posts', 'post_id', 'category_id');
    }
}
