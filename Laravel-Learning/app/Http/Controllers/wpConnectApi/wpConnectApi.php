<?php

namespace App\Http\Controllers\wpConnectApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WpConnectApi extends Controller
{
    public function get_wp_api(){
        $response = Http::get('http://codethem.io.vn/ukonline/wp-json/wp/v2/pages/427');
        $data = $response->json();
        return view('wp-api.wp-api', ['data' => $data]);
    }
}
