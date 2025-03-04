<?php

namespace App\Http\Controllers\lecture14;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection; // Gọi thư viện collection

class controllerLecture14 extends Controller
{
    /**
     * Lấy tất cả giá trị của mãng
     */
    public function collection_map(){
        $arr = [1, 2, 3, 4];
        $data = collect($arr)->all();
        return $data;
    }

    /**
     * Lọc giá trị của mãng lấy các phần tử chia hết cho 2
     */
    public function collection_filter(){
        $arr = [1, 2, 3, 4];
        $collection = collect($arr)->filter(function($item){
            return $item % 2 == 0;
        });
        return $collection;
    }

    /**
     * Loại các key được chỉ đinh của mãng
     */
    public function collection_except(){
        $arr = collect(['Name' => 'Quốc Khang', 'Phone' => '0973626954', 'Age' => '25']);
        $collection = collect($arr)->except(["Phone"]);
        return $collection->toJson(JSON_UNESCAPED_UNICODE); // JSON_UNESCAPED_UNICODE: định dạng utf8
    }
}
