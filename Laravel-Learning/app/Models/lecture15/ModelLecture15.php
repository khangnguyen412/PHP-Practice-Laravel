<?php

namespace App\Models\lecture15;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

/**
 * Eloquent relationships One to One
 * Bảng person vs passport: 1-1
 */
class model_lecture15 extends Model
{
    protected $table = "";
    protected $primaryKey = "";
    protected $field = [];
    public $timestamp = false;
}