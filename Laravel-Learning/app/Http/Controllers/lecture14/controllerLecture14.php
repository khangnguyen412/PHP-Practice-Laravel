<?php

namespace App\Http\Controllers\Lecture14;

use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\lecture12\ModelLecture12;
use App\Models\lecture13\ModelLecture13Products;
use Illuminate\Support\LazyCollection;

class ControllerLecture14 extends Controller
{
    /**
     *  Lấy tất cả giá trị của mãng
     */
    public function collection_all()
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

    /******************* Laravel 8.0 (bổ sung) ****************************/
    /**
     *  Break các giá trị bên trong collection ra thành các mảng con theo size quy định.
     */
    public function collection_chunk()
    {
        $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 12];
        $collection = collect($arr)->chunk(4); // Tách mãng mỗi 4 phần tử
        return response()->json($collection->values(), 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     *  Chuyển mãng đa chiều thành mãng đơn chiều
     */
    public function collection_collapse()
    {
        $arr = [
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ];
        $collection = collect($arr)->collapse();
        return response()->json($collection->values(), 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    /**
     *  So sánh phần tử trong mãng
     */
    public function collection_concat()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $arr2 = ['khang'];
        $arr3 = ['nguyen'];
        $collection = collect($arr)->concat($arr2)->concat($arr3);
        $collection->values()->all();
        return $collection;
    }

    /**
     *  Kiểm tra phương thức có tồn tại trong mãng ko?
     */
    public function collection_contains()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $arr2 = 9;
        $collection = collect($arr)->contains($arr2);
        return $arr2 . ' có tồn tại trong mãng [' . implode(', ', $arr) . '] ? ' . ($collection ? 'true' : 'false');
    }

    /**
     *  Vardump ra các giá trị trong mãng
     */
    public function collection_dd()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $collection = collect($arr)->dd();
        return 'Các giá trị trong mãng ' . $collection;
    }

    /**
     *  Lặp qua các phần tử tới khi gặp được điều kiên trùng hợp
     */
    public function collection_each()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        collect($arr)->each(function ($item, $key) {
            if ($item == 6) {
                echo 'Đã dừng tại vị trí ' . $key . ' có giá trị ' . $item;
            }
        });
    }

    /**
     *  Lấy giá trị đầu tiên của mãng
     */
    public function collection_first()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $collection = collect($arr)->first();
        return 'Phần tử đầu tiên: ' . $collection;
    }

    /**
     *  Đảo ngược giá trị thành key
     */
    public function collection_flip()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $collection = collect($arr)->flip()->all();
        return response()->json($collection, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     *  Tổng giá trị trong mãng
     */
    public function collection_sum()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $collection = collect($arr)->sum();
        return response()->json($collection, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     *  Tìm giá trị nhỏ nhất trong mãng
     */
    public function collection_min()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $collection = collect($arr)->min();
        return response()->json($collection, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     *  Tìm giá trị lớn nhất trong mãng
     */
    public function collection_max()
    {
        $arr = [1, 2, 4, 5, 6, 7, 9, 10];
        $collection = collect($arr)->max();
        return response()->json($collection, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     *  Chuyển thành mãng
     */
    public function collection_to_arr()
    {
        $arr = ['name' => 'Desk', 'price' => 200];
        $collection = collect($arr)->toArray();
        return response()->json($collection, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     *  Chuyển thành json
     */
    public function collection_to_json()
    {
        $arr = ['name' => 'Desk', 'price' => 200];
        $collection = collect($arr)->toJson();
        return response()->json($collection, 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    /**
     *  - Gọi 1 hàm tự custom
     */
    public function collection_to_upper()
    {
        $arr = ['long', 'khang'];
        $collection = collect($arr)->to_upper($arr);
        return $collection;
    }

    /**
     *  Lazy collection:
     *      - Giúp xử lý dữ liệu hiệu quả về mặt bộ nhớ
     *      - 
     */
    public function collection_lazy(){
        $lazy = LazyCollection::make(function () {
            $i = 0;
            while (true) {
                yield $i++;
            }
        });
        
        $lazy->take(10)->each(function ($number) {
            echo "$number\n"; // In từ 0 đến 9
        });
    }
}

/**
 *  Collection::macro: 
 *      - Một công cụ mạnh mẽ cho phép bạn thêm các phương thức tùy chỉnh vào lớp
 *      - Giúp mở rộng chức năng của Collection một cách linh hoạt và tái sử dụng được.
 *  Cú pháp: 
 *      $ Collection::macro([name], [function])
 */
Collection::macro('to_upper', function () {
    return $this->map(function ($value) {
        return strtoupper($value);
    });
});
