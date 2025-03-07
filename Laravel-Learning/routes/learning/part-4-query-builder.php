<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // add thư viện kết nối DB vào

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
    $data = DB::table('account')->get();

    // hiển thị data ra màn hình
    header('Content-Type: application/json');

    // cách 1:
?>
    <pre>data: <?php echo json_encode($data, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($data); ?> kết quả của truy vấn</p>
<?php

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
    $data = DB::table('account')->select('ACCOUNT_ID', 'AVAIL_BALANCE')->get();

    // hiển thị data ra màn hình
    header('Content-Type: application/json');
?>
    <pre>lấy cột: <?php echo json_encode($data, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($data); ?> kết quả của lấy cột</p>
<?php
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
    // lấy data với điều kiện
    $dataWithCondition = DB::table('account')
        ->select('ACCOUNT_ID', 'AVAIL_BALANCE', 'OPEN_BRANCH_ID', 'PRODUCT_CD')
        ->where('AVAIL_BALANCE', '>', '5000')->get();
    header('Content-Type: application/json');
?>
    <pre>truy xuất data với điều kiện: <?php echo json_encode($dataWithCondition, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithCondition); ?> kết quả của truy xuất data với điều kiện</p>
    <?php

    // lấy data với điều kiện lồng orwhere
    $dataWithConditionOrWhere = DB::table('account')
        ->select('ACCOUNT_ID', 'AVAIL_BALANCE', 'OPEN_BRANCH_ID')
        ->where('AVAIL_BALANCE', '>', '5000')
        ->orWhere('OPEN_BRANCH_ID', '=', '1')
        ->get();
    ?>
    <pre>truy xuất data vs điều kiện lồng ->orwhere(): <?php echo json_encode($dataWithConditionOrWhere, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithConditionOrWhere); ?> truy xuất data vs điều kiện lồng</p>
    <?php

    // lấy data với điều kiện lồng andwhere
    $dataWithConditionAndWhere = DB::table('account')
        ->select('ACCOUNT_ID', 'AVAIL_BALANCE', 'OPEN_BRANCH_ID')
        ->where('AVAIL_BALANCE', '>', '5000')
        ->Where('OPEN_BRANCH_ID', '=', '1')
        ->get();
    ?>
    <pre>truy xuất data vs điều kiện lồng where()where(): <?php echo json_encode($dataWithConditionAndWhere, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithConditionAndWhere); ?> truy xuất data vs điều kiện lồng</p>
    <?php

    // lấy dữ liệu với điều kiện like
    $dataWithConditionLike = DB::table('account')
        ->select('ACCOUNT_ID', 'AVAIL_BALANCE', 'OPEN_BRANCH_ID', 'PRODUCT_CD')
        ->where('PRODUCT_CD', 'like', 'sa%')
        ->get();
    ?>
    <pre>truy xuất data vs điều kiện like: <?php echo json_encode($dataWithConditionLike, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithConditionLike); ?> truy xuất data vs điều kiện like</p>
<?php
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
    $dataWithJoin = DB::table('account')->join('acc_transaction', 'account.ACCOUNT_ID', 'acc_transaction.ACCOUNT_ID')->get();
?>
    <pre>truy xuất data với join: <?php echo json_encode($dataWithJoin, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithJoin); ?> kết quả của join</p>
    <?php

    $dataWithLeftJoin = DB::table('account')->leftJoin('acc_transaction', 'account.ACCOUNT_ID', 'acc_transaction.ACCOUNT_ID')->get();
    ?>
    <pre>truy xuất data với left join: <?php echo json_encode($dataWithLeftJoin, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithLeftJoin); ?> truy xuất data với left join</p>
<?php
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
    $firstData = DB::table('business')->select("CUST_ID", "STATE_ID")->where("CUST_ID", "10");
    $secondData = DB::table('customer')->select("CUST_ID", "STATE")->where("CUST_ID", "11")->union($firstData)->get();
?>
    <pre>truy xuất data với unions: <?php echo json_encode($secondData, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($secondData); ?> truy xuất data với unions</p>
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
    $dataWithOrderby = DB::table('account')->select('*')->orderBy('PENDING_BALANCE', 'asc')->get();
?>
    <pre>truy xuất data với Order By: <?php echo json_encode($dataWithOrderby, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithOrderby); ?> truy xuất data với Order By</p>
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
    $dataWithRandom = DB::table('account')->inRandomOrder()->first();
?>
    <pre>truy xuất data với Random: <?php echo json_encode($dataWithRandom, JSON_PRETTY_PRINT); ?></pre>
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
    $dataWithGroupBy = DB::table('account')
        ->selectRaw('sum(AVAIL_BALANCE) as "SUM AVAIL BALANCE", PRODUCT_CD')
        ->groupBy('PRODUCT_CD')
        ->havingRaw('sum(AVAIL_BALANCE) > ?', [10000])->get();
?>
    <pre>truy xuất data với Group By - Having: <?php echo json_encode($dataWithGroupBy, JSON_PRETTY_PRINT); ?></pre>
    <p> tìm thấy <?php echo sizeof($dataWithGroupBy); ?> truy xuất data với Group By - Having</p>
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
    $dataInsert = DB::table('account')->where('ACCOUNT_ID', '30')->get();
?>
    <p> Thêm Dữ Liệu Thành Công</p>
    <pre>Dữ Liệu Vừa Thêm: <?php echo json_encode($dataInsert, JSON_PRETTY_PRINT); ?></pre>
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
    $dataUpdate = DB::table('account')->where('ACCOUNT_ID', '30')->get();
?>
    <p> Cập Nhật Dữ Liệu Thành Công</p>
    <pre>Dữ Liệu Vừa Cập Nhật: <?php echo json_encode($dataUpdate, JSON_PRETTY_PRINT); ?></pre>
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
    $dataDelete = DB::table('account')->where('ACCOUNT_ID', '>', '25')->get();
?>
    <p> Cập Nhật Dữ Liệu Thành Công</p>
    <pre>Dữ Liệu Vừa Cập Nhật: <?php echo json_encode($dataDelete, JSON_PRETTY_PRINT); ?></pre>
<?php
});
