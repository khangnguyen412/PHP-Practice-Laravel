<?php

namespace App\Models\lecture26;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\App;

class ModelLecture26 extends Model
{
    protected $table = "account";
    protected $primaryKey = "account_id";
    protected $field = [
        'account_id',
        'avail_balance',
        'close_date',
        'last_activity_date',
        'open_date',
        'pending_balance',
        'status',
        'cust_id',
        'open_branch_id',
        'open_emp_id',
        'product_cd',
    ];
    public $timestamp = false;
}