<?php

namespace App\Models\lecture22;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

class ModelLecture22 extends Model
{
    protected $table = "laravelweb_users";
    protected $primaryKey = "user_id";
    protected $field = [
        'user_name',
        'display_name',
        'email',
        'password',
        'address',
        'phone ',
    ];
    public $timestamp = true;
}