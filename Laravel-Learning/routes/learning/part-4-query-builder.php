<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // add thư viện kết nối DB vào
use Barryvdh\Debugbar\Facades\Debugbar;

/******************* lecture 10: query builder trong laravel ****************************/
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
 *      - Kết nối với cơ sở dữ liệu.
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
    // lấy bản test
    $data = DB::table('laravelweb_users')->get();

    // cách 1: hiển thị data ra màn hình dưới dạng json
    Debugbar::disable(); // tắt debugbar
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data) . " kết quả của truy vấn\n";

    // cách 2:
    // echo "<pre>";
    // echo json_encode($data, JSON_PRETTY_PRINT);
    // echo "</pre>";

    // cách 3:
    // echo "<pre>"; 
    // var_dump($data);
    // echo "</pre>"; 
});

/**
 *  - Lấy cột trong bảng
 *  Cú pháp:
 *      $   DB::table('[table name]')->select('[columnfirst]', '[columnsecond]')->get();
 *  Trong đó: 
 *      - [table name] là tên bảng trong csdl
 *      - [columnfirst], [columnsecond] các cột được truy vấn
 */
Route::get('/get-col-database', function () {
    $data = DB::table('laravelweb_users')->select('user_id', 'user_name', 'email')->get();

    // hiển thị data ra màn hình
    Debugbar::disable();
    header('Content-Type: application/json');
    echo json_encode($data, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data) . " kết quả của truy vấn\n";
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

    // lấy data với điều kiện
    $data_with_condition = DB::table('laravelweb_users')->select('user_id', 'user_name', 'display_name', 'email')->where('user_id', '>', 3)->get();
    echo "Truy xuất data vs điều kiện:" . json_encode($data_with_condition, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data_with_condition) . " kết quả của truy vấn\n\n\n";

    // lấy data với điều kiện lồng orwhere
    $data_with_condition_or_where = DB::table('laravelweb_products')->where('price', '>', '129.99')->orWhere('user_id', '>', 13)->get();
    echo "Truy xuất data vs điều kiện lồng where()orwhere():" . json_encode($data_with_condition_or_where, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data_with_condition_or_where) . " kết quả của truy vấn\n\n\n";

    // lấy data với điều kiện lồng andwhere
    $data_with_condition_and_where = DB::table('laravelweb_products')->where('price', '>', '100')->where('user_id', '=', 4)->get();
    echo "Truy xuất data vs điều kiện lồng where()andwhere():" . json_encode($data_with_condition_and_where, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data_with_condition_and_where) . " kết quả của truy vấn\n\n\n";

    // lấy dữ liệu với điều kiện like
    $data_with_condition_like = DB::table('laravelweb_users')->where('display_name', 'like', 'J%')->get();
    echo "Truy xuất data vs điều kiện like: " . json_encode($data_with_condition_like, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data_with_condition_like) . " kết quả của truy vấn\n\n\n";
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
    header('Content-Type: application/json');

    $data_with_join = DB::table('laravelweb_products')->join('laravelweb_categories', 'laravelweb_products.category_id', 'laravelweb_categories.category_id')->get();
    echo "Truy xuất data với join: " . json_encode($data_with_join, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data_with_join) . " kết quả của truy vấn\n\n\n";

    $data_with_left_join = DB::table('laravelweb_products')->leftJoin('laravelweb_users', 'laravelweb_products.user_id', 'laravelweb_users.user_id')->get();
    echo "Truy xuất data với left join: " . json_encode($data_with_left_join, JSON_PRETTY_PRINT) . "\n";
    echo "Tìm thấy: " . sizeof($data_with_left_join) . " kết quả của truy vấn\n\n\n";
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
    $first_data = DB::table('business')->select("CUST_ID", "STATE_ID")->where("CUST_ID", "10");
    $second_data = DB::table('customer')->select("CUST_ID", "STATE")->where("CUST_ID", "11")->union($first_data)->get();
?>
    <pre>truy xuất data với unions: <?php echo json_encode($second_data, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($second_data); ?> truy xuất data với unions</p>
<?php
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
    $data_with_orderby = DB::table('account')->select('*')->orderBy('PENDING_BALANCE', 'asc')->get();
?>
    <pre>truy xuất data với Order By: <?php echo json_encode($data_with_orderby, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($data_with_orderby); ?> truy xuất data với Order By</p>
<?php
});


/**
 *  - Random
 *  Cú pháp:
 *      DB::table('[table name 1]')->inRandomOrder()->first();
 *  Trong đó: 
 *      - [table name 1] là tên bảng trong csdl
 */
Route::get('/get-database-with-random', function () {
    $data_with_random = DB::table('account')->inRandomOrder()->first();
?>
    <pre>truy xuất data với Random: <?php echo json_encode($data_with_random, JSON_PRETTY_PRINT); ?></pre>
<?php
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
    $data_with_groupby = DB::table('account')
        ->selectRaw('sum(AVAIL_BALANCE) as "SUM AVAIL BALANCE", PRODUCT_CD')
        ->groupBy('PRODUCT_CD')
        ->havingRaw('sum(AVAIL_BALANCE) > ?', [10000])->get();
?>
    <pre>truy xuất data với Group By - Having: <?php echo json_encode($data_with_groupby, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($data_with_groupby); ?> truy xuất data với Group By - Having</p>
<?php
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
Route::get('/insertDB', function () {
    $data = [
        'ACCOUNT_ID'   => 30,
        'AVAIL_BALANCE'   => 6000,
        'CLOSE_DATE'   => NULL,
        'LAST_ACTIVITY_DATE'   => '2004-12-17',
        'OPEN_DATE'   => '2004-12-15',
        'PENDING_BALANCE'   => 6000,
        'STATUS'   => 'ACTIVE',
        'CUST_ID'   => 10,
        'OPEN_BRANCH_ID'   => 1,
        'OPEN_EMP_ID'   => 1,
        'PRODUCT_CD'  => 'CD'
    ];
    DB::table('account')->insert($data);
    $data_insert = DB::table('account')->where('ACCOUNT_ID', '30')->get();
?>
    <p> Thêm Dữ Liệu Thành Công</p>
    <pre>Dữ Liệu Vừa Thêm: <?php echo json_encode($data_insert, JSON_PRETTY_PRINT); ?></pre>
<?php
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
    DB::table('account')->where('ACCOUNT_ID', 30)->update(['STATUS' => 'INACTIVE']);
    $data_update = DB::table('account')->where('ACCOUNT_ID', '30')->get();
?>
    <p> Cập Nhật Dữ Liệu Thành Công</p>
    <pre>Dữ Liệu Vừa Cập Nhật: <?php echo json_encode($data_update, JSON_PRETTY_PRINT); ?></pre>
<?php
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
    DB::table('account')->where('ACCOUNT_ID', 30)->delete();
    $data_delete = DB::table('account')->where('ACCOUNT_ID', '>', '25')->get();
?>
    <p> Cập Nhật Dữ Liệu Thành Công</p>
    <pre>Dữ Liệu Vừa Cập Nhật: <?php echo json_encode($data_delete, JSON_PRETTY_PRINT); ?></pre>
<?php
});
