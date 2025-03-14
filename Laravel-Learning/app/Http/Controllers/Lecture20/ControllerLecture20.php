<?php

namespace App\Http\Controllers\Lecture20;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ControllerLecture20 extends Controller
{
    public function get_form()
    {
        return view('lecture18-19-20.view-lecture20');
    }

    public function validations_form(Request $request)
    {

    }
}
