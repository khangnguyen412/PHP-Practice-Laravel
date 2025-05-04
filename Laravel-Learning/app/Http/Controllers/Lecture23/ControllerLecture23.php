<?php

namespace App\Http\Controllers\Lecture23;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\lecture12\ModelLecture12;
use App\Http\Requests\Lecture23\RequestRegister;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerLecture23 extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    /******************* Lecture 23: Authentication Trong Laravel (Register)   ****************************/
    public function resigter_handle(RequestRegister $request)
    {
        if ($request->password !== $request->password_confirmation) {
            return response()->json([
                'status'    => 'Error',
                'message'   => 'Password confirm không hợp lệ'
            ], 404, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
        try {
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
                'status'        => 'Success',
                'request_data'  => $request->all(),
                'submited_data' => $valid_data,
                'users_list'    => $users_list,
                'message'       => 'Added user success'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        } catch (Exception $e) {
            return response()->json([
                'status'        => 'Error',
                'error'         => $e->getMessage(),
                'request_data'  => $request->all(),
                'submited_data' => $valid_data,
                'message'       => 'Added user failed'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    }

    /******************* Lecture 24: Authentication Trong Laravel (Login, Logout) ****************************/
    public function login_handle(Request $request)
    {
        try {
            $username = $request->get('username');
            $password = $request->get('password');
            $user_data = ModelLecture12::where('user_name', $username)->first();
            if ($user_data && Hash::check($password, $user_data->password)) {
                Auth::login($user_data); // đăng nhập với thông tin data được cung cấp
                return response()->json([
                    'status'        => 'Success',
                    'message'       => 'Login success',
                    'data'          => Auth::user(), // kiểm tra thông tài khoản đang đăng nhập
                    'login check'   => Auth::check(), // kiểm tra trạng thái đăng nhập
                ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            return response()->json([
                'status'    => 'Failed',
                'message'   => 'Login failed',
                'request'   => $request->all()
            ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            return response()->json([
                'status'        => 'Error',
                'error'         => $e->getMessage(),
                'request_data'  => $request->all(),
                'message'       => 'Added user failed'
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    }

    
}
