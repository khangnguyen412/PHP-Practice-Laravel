<?php

namespace App\Observers;

use Illuminate\Support\Facades\Log;

use App\Models\lecture13\ModelLecture13Users;

class Observer
{
    public function retrieved(ModelLecture13Users $user)
    {
        Log::info("Lấy người dùng thành thông");
    }
}
