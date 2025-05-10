<?php

namespace App\Http\Controllers\Lecture09;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\lecture12\ModelLecture12;

class ControllerLecture09Ext03  extends Controller
{
    public function __construct(Request $request)
    {
        /**
         *  - Kiểm tra middleware cho mỗi hàm được chỉ đinh trước khi thực hiện 
         */
        $this->middleware('check-is-admin')->only('get_user_id_13'); // Sử dụng except() cho trường hợp ngược lại

        /**
         *  - Kiểm tra middleware kèm điều kiện (>10)
         */
        $this->middleware('check-age:11');
    }

    public function get_userlist(Request $request)
    {
        $user_list = ModelLecture12::all();
        return response()->json([
            'status' => 200,
            'data' => $user_list,
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function get_user_id_13(){
        $user_id_13 = ModelLecture12::where('user_id', 13)->first();
        return response()->json([
            'status' => 200,
            'data' => $user_id_13,
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
