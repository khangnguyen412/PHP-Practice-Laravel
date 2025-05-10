<?php

namespace App\Http\Controllers\Lecture09;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ControllerLecture09Ext extends Controller
{
    public function __invoke(Request $request, $name)
    {
        return 'This is invoke with param: ' . $name;
    }
}
