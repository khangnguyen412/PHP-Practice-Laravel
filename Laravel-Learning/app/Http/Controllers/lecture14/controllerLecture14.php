<?php

namespace App\Http\Controllers\Lecture14;

use App\Http\Controllers\Controller;
use App\Models\lecture12\ModelLecture12;
use App\Models\lecture13\ModelLecture13Products;

class ControllerLecture14 extends Controller
{
    /**
     *  Lấy tất cả giá trị của mãng
     */
    public function collection_map()
    {
        $arr = [1, 2, 3, 4];
        $data = collect($arr)->all();
        return $data;
    }

    /**
     *  Lọc giá trị của mãng lấy các phần tử chia hết cho 2
     */
    public function collection_filter()
    {
        $arr = [1, 2, 3, 4];
        $collection = collect($arr)->filter(function ($item) {
            return $item % 2 == 0;
        });
        return $collection;
    }

    /**
     *  Loại các key được chỉ đinh của mãng
     */
    public function collection_except()
    {
        $arr = ['Name' => 'Quốc Khang', 'Phone' => '0973626954', 'Age' => '25'];
        $collection = collect($arr)->except(["Phone"]);
        /**
         *  JSON_UNESCAPED_UNICODE: định dạng utf8
         *  JSON_PRETTY_PRINT: định dạng json
         */
        return response()->json($collection, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     *  Đếm các phần tử của mảng 
     */
    public function collection_count()
    {
        $arr = [1, 2, 3, 4];
        $collection = collect($arr)->count();
        return $collection;
    }

    /**
     *  Tính trung bình cộng
     */
    public function collection_avg()
    {
        $arr = [1, 2, 3, 4];
        $collection = collect($arr)->avg();
        return $collection;
    }

    /**
     *  Tính trung bình cộng
     */
    public function collection_get()
    {
        $arr =  ['Name' => 'Quốc Khang 1', 'Phone' => '0973626954', 'Age' => '25'];
        $collection = collect($arr)->get('Phone');
        return $collection;
    }

    /**
     *  Sắp xếp mãng theo giá trị được chỉ định
     */
    public function collection_sort_by()
    {
        $arr = ModelLecture13Products::get();
        $collection = collect($arr)->sortBy('price');
        $collection = $collection->values(); // reset lại các key của mãng [9=>'', 4=>'', 5=>''] => [0=>'', 1=>'', 2=>'']
        return response()->json($collection, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     *  Sắp xếp mãng theo giá trị được chỉ định - ngược lại
     */
    public function collection_sort_by_desc()
    {
        $arr = ModelLecture12::get();
        $collection = collect($arr)->sortByDesc('user_id');
        $collection = $collection->values();
        return response()->json($collection, 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     *  Lấy phần tử trong mãng
     */
    public function collection_take()
    {
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $collection = collect($arr)->take(2);
        $collection = $collection->values();
        $collection_desc = collect($arr)->take(-2);
        $collection_desc = $collection_desc->values();
        return $collection . $collection_desc;
    }

    /**
     *  So sánh phần tử trong mãng
     */
    public function collection_diff()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $arr2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 12];
        $collection = collect($arr)->diff($arr2);
        $collection->values()->all();
        return $collection;
    }
}
