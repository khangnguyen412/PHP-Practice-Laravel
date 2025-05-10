<?php

namespace App\Http\Controllers\Lecture24;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControllerLecture24Ext extends Controller
{
    public function show() {}

    public function text_response(Request $request)
    {
        $result_html = response('welcome')->header('Content-Type', 'text/plain'); // Trả về chuỗi HTML
        $result_json = response()->json([
            'status' => 200,
            'data' => 'data',
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); // Trả về json
        $result_file = response()->file(storage_path('app/public/uploads/1743759710_sample.pdf')); // Trả về nội dung file
        $download_file = response()->download(storage_path('app/public/uploads/1743759710_sample.pdf')); // Tải về nội dung file
        return '';
    }
}
