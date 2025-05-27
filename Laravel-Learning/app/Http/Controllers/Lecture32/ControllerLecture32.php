<?php

namespace App\Http\Controllers\Lecture32;

use Barryvdh\Debugbar\Facades\Debugbar; // thư viện debugbar
use App\Http\Controllers\Controller;

use App\Models\lecture32\ModelLecture32;

class ControllerLecture32 extends Controller
{
    public function check_event() {
        /**
         *  - Gọi và sử dụng event
         */
        $list = ModelLecture32::all(); 
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
