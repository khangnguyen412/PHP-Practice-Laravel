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
class ModelLecture13Media extends Model
{
    use HasFactory;
    protected $table = 'laravelweb_media';

    public function mediable()
    {
        /**
         *  Sử dụng morph
         */
        return $this->morphTo();
    }

}
