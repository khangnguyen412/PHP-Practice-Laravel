<?php

namespace App\Http\Controllers\Lecture22;

use App\Http\Controllers\Controller;
use App\Models\lecture12\ModelLecture12;
use App\Http\Requests\Lecture22\RequestRegister;
use Exception;

class ControllerLecture22 extends Controller
{
    public function show()
    {
        return view('dashboard');
    }

    public function resigter_handle(RequestRegister $request)
    {
        if ($request->password !== $request->password_confirmation) {
            return response()->json([
                'status'    => 'Lỗi',
                'message'   => 'Password Confirm không hợp lệ'
            ], 404, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        try{
            $valid_data = $request->validated();
            ModelLecture12::create([
                'user_name'     => $request->username,
                'display_name'  => $request->name,
                'email'         => $request->email,
                'password'      => bcrypt($request->password),
                'address'       => 'Chưa Có Thông Tin',
                'phone'         => 'Chưa Có Thông Tin',
            ]);
            $users_list = ModelLecture12::all();
            return response()->json([
                'status'        => 'Thành Công',
                'request_data'  => $request->all(),
                'submited_data' => $valid_data,
                'users_list'    => $users_list,
                'message'       => 'Đã thêm người dùng'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }catch(Exception $e){
            return response()->json([
                'status'        => 'Lỗi',
                'error'         => $e->getMessage(),
                'request_data'  => $request->all(),
                'submited_data' => $valid_data,
                'message'       => 'Đã thêm người dùng'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        
    }
}
