<?php

namespace App\Http\Controllers\wpConnectApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class wpConnectApi extends Controller
{
    public function getWpApi(){
        $response = Http::get('http://codetheme.top/ukonline/wp-json/wp/v2/pages/427');
        $data = $response->json();
        return view('wp-api.wpApi', ['data' => $data]);
    }
}
