<?php

namespace App\Http\Controllers\Lecture26;

use Barryvdh\Debugbar\Facades\Debugbar; // thư viện debugbar
use App\Http\Controllers\Controller;
use App\Models\lecture26\ModelLecture26;

class ControllerLecture26 extends Controller
{
    public function show_debug() {
        Debugbar::info('Loading user list');
        $list = ModelLecture26::all();
        return view('lecture26.view-lecture26', ['param' => $list]);
    }
}
