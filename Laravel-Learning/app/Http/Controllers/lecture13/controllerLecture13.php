<?php

namespace App\Http\Controllers\Lecture13;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use App\Models\lecture13\ModelLecture13Post;
use App\Models\lecture13\ModelLecture13Products;
use App\Models\lecture13\ModelLecture13Users;

class ControllerLecture13 extends Controller
{
    /**
     *  Relationship Eloquent 1 - 1
     */
    public function show_eloquent_relationship_13()
    {
        // $data = ModelLecture13Users::find(1)->user_profiles; // Lấy data có id = 1
        $data = ModelLecture13Users::with('user_profiles')->get(); // Lấy tất cả data
        return view('lecture13.view-lecture13', ['data' => $data]);
    }

    /**
     *  Relationship Eloquent 1 - n
     */
    public function show_eloquent_relationship_13_1()
    {
        // $data = ModelLecture13Users::find(1)->products;
        $data = ModelLecture13Users::with('products')->get();
        return view('lecture13.view-lecture13', ['data' => $data]);
    }

    /**
     *  Relationship Eloquent n - n
     */
    public function show_eloquent_relationship_13_2()
    {
        // $data = ModelLecture13Post::find(1)->categories; 
        $data = ModelLecture13Post::with('categories')->get()->toArray();
        return view('lecture13.view-lecture13', ['data' => $data]);
    }

    /**
     *  **********************************************************************
     *  ******************* Laravel 8.0 (bổ sung) ****************************
     *  **********************************************************************
     */
    /******************* Lecture 32: Các mối quan hệ (Relationships) trong Eloquent ****************************/
    /**
     *  Relationship Eloquent HasManyThrough
     */
    public function show_eloquent_relationship_13_3()
    {
        $data = ModelLecture13Post::with('has_many_through')->get()->toArray();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  Relationship Eloquent HasManyThrough
     */
    public function show_eloquent_relationship_13_4()
    {
        $data = ModelLecture13Post::with('morph_media')->get()->toArray();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /******************* Lecture 33: Querying Relationship Existence ****************************/
    /**
     *  whereRelation(): 
     *  - [Model]::with('[relation]')->whereRelation('[relation]', [condition])->get();
     */
    public function show_eloquent_with_where_relation()
    {
        $data = ModelLecture13Users::with('products')->whereRelation('products', 'user_id', 2)->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  whereHas(): 
     *  - [Model]::with('[relation]')->whereHas('[relation]', function ($query) { $query->where([condition]); })->get();
     */
    public function show_eloquent_with_where_has()
    {
        $data = ModelLecture13Users::with('user_profiles')->whereHas('user_profiles', function ($query) {
            $query->where('profile_id', 5);
        })->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  orWhereHas(): 
     *  - [Model]::with('[relation]')->whereHas('[relation]', fn($q) => $q->where([condition]))->orWhereHas('[relation]', fn($q) => $q->where([condition]))->get();
     *  
     */
    public function show_eloquent_with_or_where_has()
    {
        $data = ModelLecture13Users::with('user_profiles')->whereHas('user_profiles', function ($query) {
            $query->where('profile_id', 5);
        })->orWhereHas('user_profiles', function ($query) {
            $query->where('profile_id', 4);
        })->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  withCount(): 
     *  - [Model]::with('[relation]')->withCount('[relation]')->get();
     */
    public function show_eloquent_with_count()
    {
        $data = ModelLecture13Users::with('products')->withCount('products')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  withSum(): 
     *  - [Model]::with('[relation]')->withSum('[relation]', '[column]')->get();
     */
    public function show_eloquent_with_sum()
    {
        $data = ModelLecture13Users::with('products')->withSum('products', 'price')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  withAvg(): 
     *  - [Model]::with('[relation]')->withAvg('[relation]', '[column]')->get();
     */
    public function show_eloquent_with_avg()
    {
        $data = ModelLecture13Users::with('products')->withAvg('products', 'price')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  withMin(): 
     *  - [Model]::with('[relation]')->withMin('[relation]', '[column]')->get();
     */
    public function show_eloquent_with_min()
    {
        $data = ModelLecture13Users::with('products')->withMin('products', 'price')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  withMax(): 
     *  - [Model]::with('[relation]')->withMax('[relation]', '[column]')->get();
     */
    public function show_eloquent_with_max()
    {
        $data = ModelLecture13Users::with('products')->withMax('products', 'price')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /******************* Lecture 34: Eager Loading ****************************/
    /**
     *  - Là một cách tối ưu database
     *  - Là kỹ thuật truy vấn trước các mối quan hệ (relationships) của model để tránh tình trạng N+1 query problem – lỗi phổ biến gây chậm ứng dụng khi làm việc với dữ liệu liên kết. 
     *  - Cú pháp:
     *      - [Model]::with('[relation]')
     */

    /******************* Lecture 35: Eloquent ORM Collection ****************************/
    /**
     *  filter(): Lọc theo điều kiện tùy ý
     */
    public function show_eloquent_collection_filler()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->filter(function ($data) {
            return $data->price > 100;
        });
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  reject(): Loại bỏ phần tử không thỏa mãn
     */
    public function show_eloquent_collection_reject()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->reject(function ($data) {
            return $data->price > 100;
        });
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  where($key, $value): Lọc theo thuộc tính
     */
    public function show_eloquent_collection_where()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->where('price', '>', 100);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  whereIn($key, $values): Lọc theo danh sách giá trị
     */
    public function show_eloquent_collection_where_in()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->whereIn('user_id', [1, 2, 3]);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  sum($key): Tính tổng một cột
     */
    public function show_eloquent_collection_sum()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->sum('price');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  avg($key): Tính trung bình
     */
    public function show_eloquent_collection_avg()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->avg('price');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  max($key) / min($key): Giá trị lớn nhất/nhỏ nhất
     */
    public function show_eloquent_collection_max()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->max('price');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  count(): Đếm phần tử
     */
    public function show_eloquent_collection_count()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->count();
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  count(): Đếm phần tử
     */
    public function show_eloquent_collection_map()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->map(function ($data) {
            return $data->name;
        });
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  each(): Duyệt qua từng phần tử (không trả về gì)
     */
    public function show_eloquent_collection_each()
    {
        $data = ModelLecture13Products::all();
        $data->each(function ($data) {
            echo $data->name . "<br>";
        });
    }

    /**
     *  transform(): Thay đổi trực tiếp collection
     */
    public function show_eloquent_collection_transform()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->transform(function ($data) {
            $data->name = strtoupper($data->name);
            return $data;
        });
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  only($keys) / except($keys): Lấy/loại bỏ các trường (lấy theo index của mãng)
     */
    public function show_eloquent_collection_only()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->only([1, 2]);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  groupBy($key): Nhóm theo giá trị một cột
     */
    public function show_eloquent_collection_groupby()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->groupBy(['product_id']);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  sortBy($key) / sortByDesc($key): Sắp xếp tăng/giảm
     */
    public function show_eloquent_collection_sortby()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->sortBy(['price']);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  unique($key): Lọc trùng lặp
     */
    public function show_eloquent_collection_unique()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->unique(['product_id']);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  contains($key, $value): Kiểm tra có tồn tại không
     */
    public function show_eloquent_collection_containts()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->where('price', '>', 100)->contains(1);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  firstWhere($key, $value): Tìm phần tử đầu tiên khớp
     */
    public function show_eloquent_collection_firstwhere()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->firstWhere('user_id', 1);
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  isEmpty() / isNotEmpty(): Kiểm tra rỗng hay không
     */
    public function show_eloquent_collection_isempty()
    {
        $data = ModelLecture13Products::all();
        if ($data->isNotEmpty()) {
            foreach ($data as $post) {
                echo $post->name . '<br>';
            }
        }
    }

    /**
     *  load($relation): Lazy load mối quan hệ sau khi lấy data
     */
    public function show_eloquent_collection_load()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->load('users');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  pluck($key): Lấy danh sách giá trị từ một cột hoặc quan hệ
     */
    public function show_eloquent_collection_pluck()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->pluck('users.user_name');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  fresh($key): Làm mới hết các giá trị trong collection
     */
    public function show_eloquent_collection_fresh()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->fresh();
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  intersect($items): trả về một collection chứa các phần tử tồn tại ở cả collection gốc và collection bạn truyền vào .
     */
    public function show_eloquent_collection_intersect()
    {
        $productsA = ModelLecture13Products::whereIn('product_id', [1, 2, 3])->get();
        $productsB = ModelLecture13Products::whereIn('product_id', [2, 3, 4])->get();
        $data = $productsA->intersect($productsB);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /**
     *  makeVisible($key): sẽ hiển thị các attribute của các model trong collection.
     */
    public function show_eloquent_collection_visible()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->makeVisible('name');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    
    /**
     *  makeVisible($key): ẩn các attribute của các model trong collection.
     */
    public function show_eloquent_collection_hidden()
    {
        $data = ModelLecture13Products::all();
        $data_output = $data->makeHidden('product_id');
        return response()->json([
            'status' => 'success',
            'data' => $data_output,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /******************* Lecture 36: Mutator và Cast ****************************/
    /**
     *  Accessors
     */
    public function show_eloquent_accessors()
    {
        $data = ModelLecture13Users::all();
        /**
         *  Sử dụng nếu chưa dùng protect appends 
         */
        // $data_output = $data->map(function($data){
        //     return [
        //         'data'      => $data,
        //         'full-name' => $data->full_name
        //     ];
        // });
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    /******************* Lecture 37: Eloquent ORM Serialize ****************************/
    /**
     *  Là quá trình chuyển đổi một đối tượng (object) thành dạng chuỗi để dễ dàng lưu trữ hoặc truyền tải.
     */
    /**
     *  Chuyển obj thành chuỗi và ngược lại
     */
    public function show_eloquent_serialize(){
        $data = ModelLecture13Users::all();
        $data_output = serialize($data); // Chuyển thành chuỗi
        $data_revert = unserialize($data_output); // Chuyển ngược lại
        return response()->json([
            'status'        => 'success',
            'data'          => $data_output,
            'data_revert'   => $data_revert,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    /**
     *  Chuyển model/collection thành mãng và json
     */
    public function show_eloquent_toarr(){
        $data = ModelLecture13Users::all()->toArray();
        return response()->json([
            'status'        => 'success',
            'data'          => $data,
        ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    public function show_eloquent_tojson(){
        $data = ModelLecture13Users::all()->toJson(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return $data;
    }
}
