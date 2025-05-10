<?php

namespace App\Http\Controllers\Lecture24;

use Exception;
use App\Http\Controllers\Controller;

use App\Models\lecture12\ModelLecture12;
use App\Http\Requests\Lecture23\RequestRegister;
use Barryvdh\Debugbar\Facades\Debugbar;

class ControllerLecture24 extends Controller
{
    public function show()
    {
        try{
            $user_list = ModelLecture12::all();
            return response()->json([
                'status' => 'Success',
                'message' => 'Get data success',
                'data' => $user_list,
            ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }catch (Exception $e){
            return response()->json([
                'status'    => 'Error',
                'message'   => 'Get data failed',
                'error'     => $e->getMessage(),
            ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        
    }
}
