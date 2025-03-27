<?php

namespace App\Http\Controllers\Lecture20;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ControllerLecture20 extends Controller
{
    public function get_form()
    {
        return view('lecture18-19-20.view-lecture20');
    }

    public function validations_form(Request $request)
    {
        /**
         *  
         */
        $valid_data = Validator::make(
            $request->all(),
            [
                'username'      => 'required|min:5|max:255',
                'email'         => 'required|email',
                'phone'         => 'required|integer',
                'city'          => 'required|max:255',
            ],
            [
                'required'      => ':attribute không được để trống',
                'min'           => ':attribute không được nhập ít hơn :min',
                'max'           => ':attribute không được nhập nhiêu hơn :max',
                'integer'       => ':attribute chỉ được nhập số',
            ],
            [
                'username'      => 'Tên đăng nhập',
                'email'         => 'Email',
                'phone'         => 'Số điện thoại',
                'city'          => 'Thành phố',
            ],
        );
        if ($valid_data->fails()){
            $errors = json_encode($valid_data->errors(), JSON_UNESCAPED_UNICODE);
            return response($errors)->header('Content-Type', 'application/json; charset=UTF-8');
        }
    }
}
