<?php

namespace App\Http\Controllers\Lecture09;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Middleware\Lecture25\Middleware25;
use App\Models\lecture12\ModelLecture12;


class ControllerLecture09Ext02  extends Controller
{
    public function __construct(Request $request)
    {
        /**
         * Kiểm tra middleware trước khi thực hiện 
         */
        $this->middleware('check-is-admin'); 
    }

    public function get_userlist(Request $request)
    {
        $user_list = ModelLecture12::all();
        return response()->json([
            'status' => 200,
            'data' => $user_list,
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
