<?php

namespace App\Http\Controllers\Lecture31;

use Barryvdh\Debugbar\Facades\Debugbar; // thư viện debugbar
use App\Http\Controllers\Controller;
use App\Models\lecture26\ModelLecture26;
use App\Scopes\UsersScope;

class ControllerLecture31 extends Controller
{
    public function check_local_scope() {
        /**
         *  - Gọi và sử dụng scopeCountUser() trong /Models/lecture26/ModelLecture26.php
         */
        $list = ModelLecture26::countUser(); 
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function check_global_scope(){
        /**
         *  - Gọi và sử dụng global scope
         */
        $list = ModelLecture26::all();
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function disable_scope() {
        /**
         *  - withoutGlobalScope dùng để bỏ các scope
         */
        $list = ModelLecture26::withoutGlobalScope(UsersScope::class)->countUser(); 
        return response()->json([
            'status'    => 'success',
            'data'      => $list,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}
