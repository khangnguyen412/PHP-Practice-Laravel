<?php

namespace App\Models\lecture13;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Eloquent relationships Many to Many
 * Bảng Post vs Categories: n-n
 */
class ModelLecture13CatePost extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'laravelweb_categories_posts';
    public $timestamp = false;
}
