<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // add thư viện kết nối DB vào
use Barryvdh\Debugbar\Facades\Debugbar;

/******************* Lecture 10: Query builder trong laravel ****************************/
/**
 *  Cấu hình lại kết nối csdl trong file .env các dòng sau: 
 *  DB_CONNECTION=mysql
 *  DB_HOST= [địa chỉ kết tới csdl]
 *  DB_PORT= [cổng]
 *  DB_DATABASE= [tên csdl]
 *  DB_USERNAME= [tên đăng nhập]
 *  DB_PASSWORD= [mật khẩu]
 *  Trong đó
 *      - [địa chỉ kết tới csdl] là máy chủ kết nối tới vào csdl (localhost = 127.0.0.1)
 *      - [cổng] cổng kết nối tới csdl (mặc định là port 3306)
 *      - [tên csdl] là tên database
 *      - [tên đăng nhập] tên tài khoản để đăng nhập vào csdl 
 *      - [mật khẩu] mật khẩu để đăng nhập vào csdl 
 * 
 *  Lưu ý: để thực hiện các truy vấn, bắt buộc:
 *      - Kết nối với SQL.
 *      - Nếu truy vấn trong controllers thì các bạn cần phải khai báo use Illuminate\Support\Facades\DB; còn trong Route thì không cần.
 */
/**
 *  - Lấy bảng csdl và hiển thị ra
 *  Cú pháp:
 *      $ DB::table('[table name]')->get();
 *  Trong đó: 
 *      [table name] là tên bảng trong csdl
 */
Route::get('/get-database', function () {
    // Tắt debugbar
    Debugbar::disable(); 
    
    // Lấy bản test
    $data = DB::table('laravelweb_users')->get();

    // Cách 1: hiển thị data ra màn hình dưới dạng json
    // header('Content-Type: application/json');
    // echo json_encode($data, JSON_PRETTY_PRINT) . "\n";
    // echo "Tìm thấy: " . sizeof($data) . " kết quả của truy vấn\n";

    // Cách 2:
    // echo "<pre>";
    // echo json_encode($data, JSON_PRETTY_PRINT);
    // echo "</pre>";

    // Cách 3:
    // echo "<pre>"; 
    // var_dump($data);
    // echo "</pre>"; 
    
    // Cách 4:
    return response()->json([
        'message'   => 'Truy xuất data',
        'total'     => 'Tìm thấy: ' . sizeof($data) . " kết quả của truy vấn",
        'data'      => $data,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
})->name('get-data');

/**
 *  - Lấy cột trong bảng
 *  Cú pháp:
 *      $   DB::table('[table name]')->select('[columnfirst]', '[columnsecond]')->get();
 *  Trong đó: 
 *      - [table name] là tên bảng trong csdl
 *      - [columnfirst], [columnsecond] các cột được truy vấn
 */
Route::get('/get-col-database', function () {
    Debugbar::disable();

    // Hiển thị data ra màn hình
    $data = DB::table('laravelweb_users')->select('user_id', 'user_name', 'email')->get();

    return response()->json([
        'message'   => 'Truy xuất data với Column',
        'total'     => 'Tìm thấy: ' . sizeof($data) . " kết quả của truy vấn",
        'data'      => $data,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - Lấy cột trong bảng với điều kiện
 *  Cú pháp: DB::table('[table name]')->where('[column]', '[condition]', '[filter]')->get();
 *  Trong đó: 
 *      - [table name] là tên bảng trong csdl
 *      - [column] cột được truy vấn dùng để xét điều kiện
 *      - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 *      - [filter] vế sau của điều kiện
 * 
 *  * Lưu ý:
 *      - nếu không vế [condition] => mặc định sẽ chọn lọc kết quả = với [filter] phía sau
 *      - thứ tự của câu lệnh sql (table -> select -> where -> get)
 */
Route::get('/get-database-with-condition', function () {
    Debugbar::disable();
    header('Content-Type: application/json');

    // Lấy data với điều kiện
    $data_with_condition = DB::table('laravelweb_users')->select('user_id', 'user_name', 'display_name', 'email')->where('user_id', '>', 3)->get();

    // Lấy data với điều kiện lồng orwhere
    $data_with_condition_or_where = DB::table('laravelweb_products')->where('price', '>', '129.99')->orWhere('user_id', '>', 13)->get();

    // Lấy data với điều kiện lồng andwhere
    $data_with_condition_and_where = DB::table('laravelweb_products')->where('price', '>', '100')->where('user_id', '=', 4)->get();

    // Lấy bản ghi với điều kiện like
    $data_with_condition_like = DB::table('laravelweb_users')->where('display_name', 'like', 'J%')->get();

    return response()->json([
        'message'   => 'Truy xuất data với Condition',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_condition) . " kết quả của truy vấn",
        'data'      => $data_with_condition,
        'message'   => 'Truy xuất data với Condition OrWhere',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_condition_or_where) . " kết quả của truy vấn",
        'data'      => $data_with_condition_or_where,
        'message'   => 'Truy xuất data với Condition AndWhere',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_condition_and_where) . " kết quả của truy vấn",
        'data'      => $data_with_condition_and_where,
        'message'   => 'Truy xuất data với Condition Like',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_condition_like) . " kết quả của truy vấn",
        'data'      => $data_with_condition_like,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - Join bảng 
 *  Cú pháp: DB::table('[table name 1]')->join('[table name 2]', '[column]', '[condition]', '[filter]')->get();
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 *      - [table name 2] là tên bảng thứ 2 sau vế được join
 *      - [column] cột được truy vấn để xét điều kiện
 *      - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 *      - [filter] vế sau của điều kiện
 */
Route::get('/get-database-with-join', function () {
    Debugbar::disable();

    $data_with_join = DB::table('laravelweb_products')->join('laravelweb_categories', 'laravelweb_products.category_id', 'laravelweb_categories.category_id')->get();
    $data_with_left_join = DB::table('laravelweb_products')->leftJoin('laravelweb_users', 'laravelweb_products.user_id', 'laravelweb_users.user_id')->get();

    return response()->json([
        'message'   => 'Truy xuất data với Join',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_join) . " kết quả của truy vấn",
        'data'      => $data_with_join,
        'message'   => 'Truy xuất data với Left Join',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_left_join) . " kết quả của truy vấn",
        'data'      => $data_with_left_join,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - Unions
 *  Cú pháp:
 *      $ firstData = DB::table('[table name 1]')->where('[column]', '[condition]', '[filter]')
 *      $ secondData = DB::table('[table name 2]')->where('[column]', '[condition]', '[filter]')->union($firstData)->get()
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 *      - [table name 2] là tên bảng thứ 2 sau vế được join
 *      - [column] cột được truy vấn để xét điều kiện
 *      - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 *      - [filter] vế sau của điều kiện
 */
Route::get('/get-database-with-unions', function () {
    $first_data = DB::table('laravelweb_products')->select("product_id", "name")->where("product_id", "10");
    $second_data = DB::table('laravelweb_product_meta')->select("product_id", "meta_key")->where("product_id", "10 ")->union($first_data)->get();
    Debugbar::disable();
    return response()->json([
        'message'   => 'Truy xuất data với Unions',
        'total'     => 'Tìm thấy: ' . sizeof($second_data) . " kết quả của truy vấn",
        'data'      => $second_data
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - Order by
 *  Cú pháp:
 *      $ DB::table('[table name 1]')->orderBy( '[column]', '[desc/asc]')->get();
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 *      - [column] cột được truy vấn để xét điều kiện
 *      - [desc/asc] lọc theo thứ tự (desc:giảm dần)(asc:tăng dần)
 */
Route::get('/get-database-with-order-by', function () {
    $data_with_orderby = DB::table('laravelweb_products')->orderBy('price', 'asc')->get();
    Debugbar::disable();
    return response()->json([
        'message'   => 'Truy xuất data với Order By',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_orderby) . " kết quả của truy vấn",
        'data'      => $data_with_orderby
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - Random: sắp xếp ngẫu nhiên và lấy phần tử đầu tiên
 *  Cú pháp:
 *      DB::table('[table name 1]')->inRandomOrder()->first();
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 */
Route::get('/get-database-with-random', function () {
    $data_with_random = DB::table('laravelweb_products')->inRandomOrder()->first();
    Debugbar::disable();
    return response()->json([
        'message'   => 'Truy xuất data với Random',
        'data'      => $data_with_random
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - GroupBy/having
 *  Cú pháp:
 *      $ DB::table('[table name 1]')
 *      ->selectRaw('sum,avg,count([column]) as "[name_as]", n[column]')
 *      ->groupBy('[column]')
 *      ->havingRaw('sum,avg,count([column]) [condition] ?', [variable])->get();
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 *      - [column] cột được truy vấn
 *      - [name_as] định danh cột
 *      - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 *      - [variable] vế sau của điều kiện, có thể là 1 biến truyền vào
 */
Route::get('/get-database-with-groupby-having', function () {
    $data_with_groupby = DB::table('laravelweb_products')->selectRaw('sum(price) as "Total Price", category_id')->groupBy('category_id')->havingRaw('sum(price) > ?', [500])->get();
    Debugbar::disable();
    return response()->json([
        'message'   => 'Truy xuất data với Group By - Having',
        'total'     => 'Tìm thấy: ' . sizeof($data_with_groupby) . " kết quả của truy vấn",
        'data'      => $data_with_groupby
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  - Insert 
 *  Cú pháp:
 *      $ DB::table('[table name 1]')->insert('[key] => [value]')
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csd      l
 *      - [key] tên cột
 *      - [value] giá trị
 */
Route::get('/insert-database', function () {
    Debugbar::disable();
    try {
        if (DB::table('laravelweb_products')->where('slug', 'iphone-16-pro-max')->exists()) {
            $data_exists = DB::table('laravelweb_products')->where('slug', 'iphone-16-pro-max')->get();
            return response()->json([
                'message'       => 'Slug đã tồn tại',
                'data_exists'   => $data_exists,
            ], 400, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        $data = [
            'name'                  => 'Iphone 16 pro max',
            'slug'                  => 'iphone-16-pro-max',
            'description'           => 'Smartphone for your life',
            'price'                 => '1000',
            'image'                 => 'iphone-16-pro-max.jpg',
            'user_id'               => 1,
            'category_id'           => 1,
            'created_at'            => now(),
            'updated_at'            => now(),
        ];
        DB::table('laravelweb_products')->insert($data);
        $data_insert = DB::table('laravelweb_products')->orderBy('product_id', 'DESC')->get()->first();

        return response()->json([
            'message'   => 'Thêm bản ghi thành công',
            'data'      => $data_insert
        ], 201, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        return response()->json([
            'code'      => 'Mã lỗi: ' . $e->getCode(),
            'message'   => 'Thêm bản ghi thất bại: ' . $e->getMessage(),
            'data'      => null
        ], 500, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
});

/**
 *  - Update 
 *  Cú pháp:
 *      $ DB::table('[table name 1]')->where('[column]', '[condition]', '[filter]')->update(['[column] => [value]'])
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 *      - [column] cột được truy vấn
 *      - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 *      - [filter] vế sau của điều kiện
 *      - [value] giá trị
 */
Route::get('/update-database', function () {
    Debugbar::disable();
    try {
        if (!DB::table('laravelweb_products')->where('slug', 'iphone-16-pro-max')->exists()) {
            $data = DB::table('laravelweb_products')->get();
            return response()->json([
                'message'       => 'Bản ghi ko tồn tại',
                'data'          => $data,
            ], 404, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }

        DB::table('laravelweb_products')->where('slug', 'iphone-16-pro-max')->update(['price' => 1500]);
        $data_update = DB::table('laravelweb_products')->get();
        return response()->json([
            'message'   => 'Cập nhật bản ghi thành công',
            'data'      => $data_update
        ], 201, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        return response()->json([
            'code'      => 'Mã lỗi: ' . $e->getCode(),
            'message'   => 'Cập nhật bản ghi thất bại: ' . $e->getMessage(),
            'data'      => null
        ], 500, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
});

/**
 *  - Delete 
 *  Cú pháp:
 *      $ DB::table('[table name 1]')->where('[column]', '[condition]', '[filter]')->delete()
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 *      - [column] cột được truy vấn
 *      - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 *      - [filter] vế sau của điều kiện
 */
Route::get('/delete-database', function () {
    Debugbar::disable();
    try{
        if (DB::table('laravelweb_products')->where('product_id', '>', 15)->count()>0) {
            DB::table('laravelweb_products')->where('product_id', '>', 15)->delete();
            $data_delete = DB::table('laravelweb_products')->get();
            return response()->json([
                'message'           => "Xóa thành công bản ghi",
                'data'              => $data_delete,
                'remaining_count'   => 'Số bản ghi còn lại: ' . sizeof($data_delete),
            ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        };
        return response()->json([
            'message'   => 'Không tìm thấy bản ghi nào để xóa',
            'data'      => DB::table('laravelweb_products')->get()
        ], 404, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }catch(Exception $e){
        return response()->json([
            'code'      => 'Mã lỗi: ' . $e->getCode(),
            'message'   => 'Xóa bản ghi thất bại: ' . $e->getMessage(),
            'data'      => null
        ], 500, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
});
