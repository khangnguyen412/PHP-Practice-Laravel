<?php

namespace App\Http\Controllers\Lecture21;

use App\Http\Controllers\Controller;
use App\Http\Requests\lecture21\RequestForm21;

class ControllerLecture21 extends Controller
{
    public function get_form()
    {
        return view('lecture21.view-lecture21');
    }

    public function validations_form_request(RequestForm21 $request)
    {
        $validation_data = $request->validated();

        // Tạo User

        // $result = json_encode($validation_data, JSON_UNESCAPED_UNICODE);
        // return response($result)->header('Content-Type', 'application/json; charset=UTF-8');

        // return response()->json($validation_data, 200, [], JSON_UNESCAPED_UNICODE);

        $validation_data = $request->validated();
        return response()->json($validation_data, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
