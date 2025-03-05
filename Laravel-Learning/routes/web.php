<?php

// gọi thư viện
use Illuminate\Support\Facades\Route; // thư viện nhận route
use Illuminate\Http\Request; // thư viện nhận tham số cho form post
use Illuminate\Support\Facades\DB; // add thư viện kết nối DB vào

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// view nằm trong đường dẫn: resources/views
// controller nằm trong đường dẫn: app/http


/******************* lecture 3: route (part1) ****************************/
/**
 * Các Loại Route:
 * Route::get
 * Route::post 
 * Route::put
 * Route::delete
 * Route::match         kết hợp nhiều phương phức như POST,GET,PUT,..
 * Route::any           nhận tất cả các phương thức.
 * Route::group         tạo ra các nhóm route.
 * Route::controller    gọi đến controller tương ứng mà chúng ta tự định.
 * Route::resource      sử dụng với resource controller.
 * 
 * Các route mà Laravel có hỗ trợ thêm:
 * Route::redirect      dùng để chuyển hướng đường dẫn
 * Route::view          Thay đổi và hiển thị view được chỉ định
 * Route::prefix        Dùng tiền tố của đường dẫn
 */


/**
 * Route::get
 * Cú pháp:     Route::get('url', $action);
 * Trong Đó:
 * -> 'url' là đường dẫn trên web
 * -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
// gọi tới đường dẫn '/helloWorld' sẽ thực hiện 1 function ở phía sau
Route::get('/hello-world', function () {
    return 'đây là khởi đầu quá trinh tự học framework của Khang';
});
// gọi tới đường dẫn '/' chính sẽ được chuyển tới views/welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});
// gọi tới đường dẫn '/testGetRoute' chính sẽ được chuyển tới views/lecture03/testGetRoute.blade.php
Route::get('/test-route-get', function () {
    return view('lecture03.testRouteGet');
});


/**
 * Route::post
 * tương tự như get nhưng khác nhau:
 * - get có thể gọi trực tiếp từ url còn post chỉ đc gọi form
 * 
 * Cú pháp:     Route::post('url', $action);
 * Trong Đó:
 * -> 'url' là đường dẫn trên web
 * -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
// tạo 1 form nhập dữ liệu có method post tại file views/lecture03/getFormPost.blade.php
// trong form sẽ có phương thức post vào gọi tới url /testPostRoute
Route::get('/get-post-form', function () {
    return view('lecture03.getPostForm');
});
// gọi tới đường dẫn '/testPostRoute' sẽ thực hiện 1 function ở phía sau nhưng sử dụng post
Route::post('/test-route-post', function (Request $arr) {
    $name = $arr->input('name');
    return "test method post của laravel và post có tham số là $name";
});
// để post sử dụng thư viện Request và nhận tham số của $arr

/**
 * Route::match
 * Chấp nhập tất cả phương thức được khai báo
 * 
 * Cú pháp:     Route::match([method], 'url', $action);
 * Trong đó:
 * -> [method] là phương thức có thể sử dụng trong route này
 * -> 'url' là đường dẫn trên web
 * -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
Route::get('/get-match-form', function () {
    return view('lecture03.getMatchForm');
});
Route::match(['get', 'post'], '/test-route-match', function (Request $arr) {
    $param1 = $arr->input('name');
    if (isset($param1)) {
        return "đã gọi vào thành công method match và kèm theo tham số $param1";
    }
    return 'đã gọi vào thành công method match';
});
// khi gọi trực tiếp tới url /testMatchRoute trên thanh url của gg, match nhận method get
// khi gọi nhập số từ url /getFormMatch và submit, match nhận method post

/**
 * Route::any
 * Chấp nhập tất cả phương thức
 * 
 * Cú pháp:     Route::any('url', $action);
 * Trong đó:
 * -> 'url' là đường dẫn trên web
 * -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
Route::any('/test-route-any', function () {
    return 'đây là route any';
});


/******************* lecture 4: route (part2) ****************************/
/**
 * Route::resource()
 * Là một chức năng giúp chúng ta xây dựng RESTful(websevice) một cách nhanh chóng.
 * 
 * Cú pháp:     Route::resource('url', 'tencontroller', $tuybien);
 * Trong đó:
 * -> 'url' là đường dẫn trên web
 * -> 'tencontroller' là tên của controller (không đi kèm đuôi .php).
 * -> $tuybien là các tùy biến phương thức được sử dụng trong Route, Tham số này có thể bỏ qua nếu không cần thiết.
 * 
 * * lưu ý: Để sử dụng được Route::resource() thì cần phải tạo ra một RESTful Controller và import ctrler vào đây
 * 
 * Để dùng route::resource tạo restful ta dùng lệnh:    php artisan make:controller TenController --resource
 * Trong đó: 
 * -> TenController là tên của controller bạn muốn tạo
 * 
 * nhập url /getRouteResource để nhận method index()
 * nhập url /getRouteResource/create để nhận method create()
 * nhập url /getRouteResource/ để nhận method store()
 * nhập url /getRouteResource/{something} để nhận method show()
 * nhập url /getRouteResource/{something}/edit để nhận method edit()
 * nhập url /getRouteResource/{something} để nhận method update()
 * nhập url /getRouteResource/{something} để nhận method destroy()
 */
// Gọi thư viện 
use App\Http\Controllers\lecture04\controllerLecture04; //gọi controller từ lecture04\controllerLecture04
Route::resource('/get-route-resource', controllerLecture04::class);
// ngoài ra có thể dùng tùy biến [only] để lọc các method()
// chỉ nhận 3 method create(), show(). edit()
Route::resource('/get-route-resource-only', controllerLecture04::class, ['only' => ['create', 'show', 'edit']]);
// cấm method index(), gọi vào sẽ xuất lỗi
Route::resource('/get-route-resource-except', controllerLecture04::class, ['except' => ['index']]);
// truyền tham số thêm vào route resource
// cách truyền url /get-route-resource-with-param/{param1}/author/{param2}
Route::resource('/get-route-resource-with-param.author', controllerLecture04::class);


/**
 * Route::group()
 * Là một cách để nhóm các route lại với nhau, giúp bạn tổ chức mã nguồn một cách gọn gàng và cấu trúc.
 * Điều này giúp quản lý và duy trì các route dễ dàng hơn, đặc biệt là khi bạn có nhiều route liên quan đến nhau.
 * Ví dụ: admin/...
 * 
 * Cú pháp:     Route::group($attr, $handle);
 * Trong đó
 * - $attr là các mãng thành phần điều kiện
 * - $handle là các câu lệnh hoặc hàm thực hiện chức năng cho route đó
 */
// sử dụng route::group(prefix)
Route::group(['prefix' => 'testRouteGroup'], function () {
    Route::get('get', function () {
        return view("lecture04.testRouteGroup");
    });
    Route::get('return', function () {
        return 'đây là phần tử của route group';
    });
});
// sử dụng route::controller()
Route::controller(controllerLecture04::class)->group(function () {
    Route::get('/get-route-grp-with-ctrl/{param}', 'testGroup');
    Route::get('/get-route-grp-with-ctrl', 'testGroup');
});


/**
 * Route::prefix()
 * Nhóm các route có cùng đường dẫn tiền tố 
 * Ví dụ: admin/...
 * 
 * Cú pháp:     Route::prefix('[prefix/]')->group($handle);
 * Trong đó
 * - [prefix/] là tiền tố của đường dẫn, ví dụ: prefix/admin, prefix/user, prefix/...
 * - $handle là các câu lệnh hoặc hàm thực hiện chức năng cho route đó
 */
Route::prefix('test-route-prefix')->group(function () {
    Route::get('get', function () {
        return view("lecture04.testRouteGroup");
    });
});


/**
 * Route::redirect()
 * Cho phép chuyển hướng đường dẫn khác khi được gọi tới đường đẫn được chỉ định
 * 
 * Cú Pháp:     Route::redirect('[URI1]', '[URI2]', $status);
 * Trong đó
 * - [URI1] là các đường dẫn của route khi gọi tới
 * - [URI2] là các đường dẫn của route sẽ được chuyển hướng tới sau khi gọi 
 * - $status là trang thái của route khi gọi tới
 */
Route::redirect('test-route-redirect', 'testRedirect', 301);
Route::get('/testRedirect', function () {
    return view('lecture04.testRouteRedirect');
});


/******************* lecture 5: route (part3) ****************************/
// truyền biến vào route
Route::get('/put-args-in-route/{param}', function ($param) {
    return view('lecture05.putArgInRoute', ['param' => $param]);
    /**
     * {param} là tham số được truyền vào route
     * truyền thêm tham số name trong mãng ['name' => $name] vào view
     * nếu view có đường dẫn / thì dùng dấu . để phân cách 
     */
});
// truyền nhiều tham số vào route
Route::get('/put-args-in-route/{param1}/{param2}', function ($param1, $param2) {
    return view('lecture05.putArgsInRoute', ['param1' => $param1, "param2" => $param2]);
});
// truyền biến vào route có điều kiện, nếu đk không đúng => not found
Route::get('/put-args-in-route-with-condition/{param1}/{param2}', function ($param1, $param2) {
    return view('lecture05.putArgsInRoute', ['param1' => $param1, "param2" => $param2]);
})->where(['param1' => '[a-z]+', 'param2' => '[0-9]+']);


/******************* lecture 6: view ****************************/
/**
 * -View Trong Laravel thì bắt buộc phải được nằm trong thư mục resources/views
 * -Đuôi của file view trong laravel có định dạng là .blade.php (blade template)
 * -Hoặc file .php, nếu blade.php thì phải dùng cú pháp của blade template
 * 
 * Ví dụ ở đường dẫn: resources/views/lecture06/viewTemplate.blade.php
 * 
 * Cú pháp: view('url', 'param');
 * Trong đó
 * - 'url' là đường dẫn tới view
 * - 'param' là tham số truyền vào view (nếu có)
 */
// gọi view trong route
Route::get('test-view-template', function () {
    return view('lecture06.ViewTemplate');
});
// truyền biến vào view có file .php
Route::get('test-view-template-php-file/{param}', function ($param) {
    return view('lecture06.ViewTemplatePhp', ['param' => $param]);
});
// tạo view dùng chung (trong app/Providers/AppServiceProvider.php.)


/** 
 * Dùng compact() truyền dữ liệu cho view
 * 
 * Cú Pháp:     view('url', compact('param'));
 * Trong đó 
 * - 'url' là đường dẫn tới view
 * - param là đối số truyền vào
 */
Route::get('test-view-template-use-compact/{param}', function ($param) {
    return view("lecture06.viewTemplateUseCompact", compact('param'));
});


/** 
 * Dùng with() truyền dữ liệu cho view
 * 
 * Cú Pháp:     view('url')->with('key', $value);
 * Trong đó 
 * - 'url' là đường dẫn tới view
 * - 'key' là tên của đối số được truyền
 * - $value là giá trì của đối số
 */
Route::get('test-view-template-use-with/{param}', function ($param) {
    return view("lecture06.viewTemplateUseWith")->with('param', $param);
});


/** 
 * Dùng mãng truyền dữ liệu cho view
 * 
 * Cú Pháp:     view('url', ['key' => $value]);
 * Trong đó 
 * - 'url' là đường dẫn tới view
 * - 'key' là tên của đối số được truyền
 * - $value là giá trì của đối số
 */
Route::get('test-view-template-use-array/{param}', function ($param) {
    return view("lecture06.viewTemplateUseArray", ['param' => $param]);
});


/******************* lecture 7: blade template ****************************/
/**
 * blade template: là một view trong laravel đặt trong resources/views có đuôi file .blade.php 
 * 
 * sử dung blade template
 * Cú pháp:     {{ $variable }}
 * Trong đó
 * - $variable là biến được truyền vào
 */
//  truyền tham số /{param} vào view template
Route::get('test-blade-template/{param}', function ($param) {
    return view("lecture07.testViewEngine", ["param" => $param]);
});
// câu lệnh vòng lặp trong blade template
Route::get('test-blade-template-with-loop/', function () {
    return view("lecture07.testViewEngineLoop");
});
// câu lệnh điều kiện trong blade template
Route::get('test-blade-template-with-condition/', function () {
    return view("lecture07.testViewEngineCondition");
});


/******************* lecture 8: blade template (part2) ****************************/
/**
 * Template kế thừa (Template inheritance)
 * ghi chứ bài học trong:
 * - resources/views/lecture08/testViewTemplateInheritance.blade.php
 * - resources/views/lecture08/parentTemplate.blade.php
 */
Route::get('test-blade-template-inheritance/', function () {
    return view("lecture08.testViewTemplateInheritance");
});


/******************* lecture 9: controller trong laravel ****************************/
/**
 * tạo thư mục phụ trong controler:
 * - trường hợp có file sẵn cấu trúc lại:
 *      + tạo sub folder và kéo file vào
 *      + tại file này khai báo lại đường dẫn, vd: App\Http\Controllers\lecture09\adminController;
 *      + trong file đc kéo vào sub folder, khai báo lại 2 đường dẫn, ví dụ:
 *          namespace App\Http\Controllers\lecture09;
 *          use App\Http\Controllers\Controller;
 * 
 * - trường hợp chứ có file dùng lệnh: php artisan make:controller [tên sub folder]/[tên controller]
 * 
 * Cú pháp gọi controller:      [controllerClass::class, "function"]
 * Trong đó
 * - controllerClass lớp đối tượng được khai báo
 * - function là hàm bên trong lớp đói tượng đó
 */
use App\Http\Controllers\lecture09\controllerLecture09;
// gọi tới controller có đường dẫn app/http/lecture09/lecture09.php và thực hiện hàm index
Route::get('/call-controler', [controllerLecture09::class, 'testController']);
// gọi tới hàm addDB trong controller 
Route::get('/data-to-controler', [controllerLecture09::class, 'addDB']);
// truyền tham số {param} cho vào controler
Route::get('/param-to-controller/{param}/', [controllerLecture09::class, 'getName']);
// truyền tham số {param} cho vào controler kèm theo điều kiện regex
// điều kiện sai => kết quả NOT FOUND
Route::get('/param-to-controller-with-condition/{param}/', [controllerLecture09::class, 'getName'])->where(['param' => '[a-zA-Z]+']);


/******************* lecture 10: query builder trong laravel ****************************/
/**
 * cấu hình lại kết nối csdl trong file .env các dòng sau: 
 * DB_CONNECTION=mysql
 * DB_HOST= [địa chỉ kết tới csdl]
 * DB_PORT= [cổng]
 * DB_DATABASE= [tên csdl]
 * DB_USERNAME= [tên đăng nhập]
 * DB_PASSWORD= [mật khẩu]
 * Trong đó
 * - [địa chỉ kết tới csdl] là máy chủ kết nối tới vào csdl (localhost = 127.0.0.1)
 * - [cổng] cổng kết nối tới csdl (mặc định là port 3306)
 * - [tên csdl] là tên database
 * - [tên đăng nhập] tên tài khoản để đăng nhập vào csdl 
 * - [mật khẩu] mật khẩu để đăng nhập vào csdl 
 * 
 * lưu ý: để thực hiện các truy vấn, bắt buộc:
 * - Kết nối với cơ sở dữ liệu.
 * - Nếu truy vấn trong controllers thì các bạn cần phải khai báo use Illuminate\Support\Facades\DB; còn trong Route thì không cần.
 */
/**
 * - Lấy bảng csdl và hiển thị ra
 * Cú pháp:  DB::table('[table name]')->get();
 * Trong đó: [table name] là tên bảng trong csdl
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
 * - lấy cột trong bảng
 * Cú pháp: DB::table('[table name]')->select('[columnfirst]', '[columnsecond]')->get();
 * Trong đó: 
 * - [table name] là tên bảng trong csdl
 * - [columnfirst], [columnsecond] các cột được truy vấn
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
 * - lấy cột trong bảng với điều kiện
 * Cú pháp: DB::table('[table name]')->where('[column]', '[condition]', '[filter]')->get();
 * Trong đó: 
 * - [table name] là tên bảng trong csdl
 * - [column] cột được truy vấn dùng để xét điều kiện
 * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 * - [filter] vế sau của điều kiện
 * 
 * * Lưu ý:
 * - nếu không vế [condition] => mặc định sẽ chọn lọc kết quả = với [filter] phía sau
 * - thứ tự của câu lệnh sql (table -> select -> where -> get)
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
 * - join bảng 
 * Cú pháp: DB::table('[table name 1]')->join('[table name 2]', '[column]', '[condition]', '[filter]')->get();
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [table name 2] là tên bảng thứ 2 sau vế được join
 * - [column] cột được truy vấn để xét điều kiện
 * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 * - [filter] vế sau của điều kiện
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
 * - unions
 * Cú pháp:
 *      $firstData = DB::table('[table name 1]')->where('[column]', '[condition]', '[filter]')
 *      $secondData = DB::table('[table name 2]')->where('[column]', '[condition]', '[filter]')->union($firstData)->get()
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [table name 2] là tên bảng thứ 2 sau vế được join
 * - [column] cột được truy vấn để xét điều kiện
 * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 * - [filter] vế sau của điều kiện
 */
Route::get('/get-database-with-unions', function () {
    $firstData = DB::table('business')->select("CUST_ID", "STATE_ID")->where("CUST_ID","10");
    $secondData = DB::table('customer')->select("CUST_ID", "STATE")->where("CUST_ID","11")->union($firstData)->get();
    ?>
        <pre>truy xuất data với unions: <?php echo json_encode($secondData, JSON_PRETTY_PRINT); ?></pre>
        <p> tìm thấy <?php echo sizeof($secondData); ?> truy xuất data với unions</p>
    <?php
});


/**
 * - order by
 * Cú pháp:
 *      DB::table('[table name 1]')->orderBy( '[column]', '[desc/asc]')->get();
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [column] cột được truy vấn để xét điều kiện
 * - [desc/asc] lọc theo thứ tự (desc:giảm dần)(asc:tăng dần)
 */
Route::get('/get-database-with-order-by', function () {
    $dataWithOrderby = DB::table('account')->select('*')->orderBy('PENDING_BALANCE', 'asc')->get();
    ?>
        <pre>truy xuất data với Order By: <?php echo json_encode($dataWithOrderby, JSON_PRETTY_PRINT); ?></pre>
        <p> tìm thấy <?php echo sizeof($dataWithOrderby); ?> truy xuất data với Order By</p>
    <?php
});


/**
 * - random
 * Cú pháp:
 *      DB::table('[table name 1]')->inRandomOrder()->first();
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 */
Route::get('/get-database-with-random', function () {
    $dataWithRandom = DB::table('account')->inRandomOrder()->first();
    ?>
        <pre>truy xuất data với Random: <?php echo json_encode($dataWithRandom, JSON_PRETTY_PRINT); ?></pre>
    <?php
});

/**
 * - GroupBy/having
 * Cú pháp:
 *      DB::table('[table name 1]')
 *      ->selectRaw('sum,avg,count([column]) as "[name_as]", n[column]')
 *      ->groupBy('[column]')
 *      ->havingRaw('sum,avg,count([column]) [condition] ?', [variable])->get();
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [column] cột được truy vấn
 * - [name_as] định danh cột
 * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 * - [variable] vế sau của điều kiện, có thể là 1 biến truyền vào
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
 * - insert 
 * Cú pháp:
 *      DB::table('[table name 1]')->insert('[key] => [value]')
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [key] tên cột
 * - [value] giá trị
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
    DB::table('account')->insert( $data );
    $dataInsert = DB::table('account')->where('ACCOUNT_ID', '30')->get();
    ?>
        <p> Thêm Dữ Liệu Thành Công</p>
        <pre>Dữ Liệu Vừa Thêm: <?php echo json_encode($dataInsert, JSON_PRETTY_PRINT); ?></pre>
    <?php
});

/**
 * - update 
 * Cú pháp:
 *      DB::table('[table name 1]')->where('[column]', '[condition]', '[filter]')->update(['[column] => [value]'])
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [column] cột được truy vấn
 * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 * - [filter] vế sau của điều kiện
 * - [value] giá trị
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
 * - delete 
 * Cú pháp:
 *      DB::table('[table name 1]')->where('[column]', '[condition]', '[filter]')->delete()
 * Trong đó: 
 * - [table name 1] là tên bảng trong csdl
 * - [column] cột được truy vấn
 * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
 * - [filter] vế sau của điều kiện
 */
Route::get('/delete-database', function () {
    DB::table('account')->where('ACCOUNT_ID', 30)->delete();
    $dataDelete = DB::table('account')->where('ACCOUNT_ID', '>','25')->get();
    ?>
        <p> Cập Nhật Dữ Liệu Thành Công</p>
        <pre>Dữ Liệu Vừa Cập Nhật: <?php echo json_encode($dataDelete, JSON_PRETTY_PRINT); ?></pre>
    <?php
});


/******************* lecture 11: Model trong Laravel ****************************/
/**
 * Model được dặt ở trong thư mục /app
 * 
 * Để tạo tự động 1 model áp dụng 1 trong 2 lệnh sau:
 * -> php artisan make:model [sub folder]\[model name]
 * -> php artisan make:model [sub folder]\[model name] --migration
 * Trong đó: 
 * - [model name] là tên của model được tạo
 * - [sub folder] tên đường dẫn hoặc folder
 * 
 * Khai báo các thông số tùy chỉnh: trong file ../app/Models/lecture11.php
 */


/******************* lecture 12: Eloquent ORM trong Laravel ****************************/
/**
 * Gọi model trong controller
 * - Tạo controller qua đường dẫn: /app/Http/Controllers/lecture12/lectureController12.php
 * 
 * Note trong: /app/Http/Controllers/lecture12/lectureController12.php
 */
use App\Http\Controllers\lecture12\controllerLecture12;
// gọi model từ controller
Route::get('/model-12', [controllerLecture12::class, "test"]);
// lấy tất cả datable trên bảng dữ liệu
Route::get('/get-data-model-12', [controllerLecture12::class, "getData"]);
// lấy ra một dòng dữ liệu bằng khóa chính
Route::get('/get-by-primary-key-model-12', [controllerLecture12::class, "getByPrimaryKey"]);
// lấy dữ liệu với điều kiện
Route::get('/get-by-condition-model-12', [controllerLecture12::class, "getByCondition"]);
// chọn cột dữ liệu được lấy
Route::get('/get-by-column-model-12', [controllerLecture12::class, "getByColumn"]);
// đếm dữ liệu trong bảng 
Route::get('/count-data-model-12', [controllerLecture12::class, "countData"]);
// thêm dữ liệu vào bảng
Route::get('/add-data-model-12', [controllerLecture12::class, "addData"]);
// cập nhật dữ liệu trong bảng
Route::get('/update-dataModel-12', [controllerLecture12::class, "updateData"]);
// xóa dữ liệu trong bảng
Route::get('/delete-dataModel-12', [controllerLecture12::class, "deleteData"]);

/******************* lecture 13: Các mối quan hệ (Relationships) trong Eloquent ****************************/
/**
 * Các mối quan hệ trong Eloquent.
 * - Tạo controller qua đường dẫn: /app/Http/Controllers/lecture13/lectureController13.php
 * - Tạo model: php artisan make:model lecture13\modelLecture13 --migration
 * 
 * Note trong: 
 * /app/Http/Controllers/lecture13/lectureController13.php
 * /app/Models/lecture13
 * 
 * Link Fix Lỗi: viblo.asia/p/eloquent-relationships-in-laravel-phan-1-PdbGnoEdeyA
 */
use App\Http\Controllers\lecture13\controllerLecture13;
// Eloquent one-to-one 
Route::get('/relations-eloquent-13', [controllerLecture13::class, 'show_eloquent_relationship_13']);
// Eloquent one-to-many 
Route::get('/relations-eloquent-13-1', [controllerLecture13::class, 'show_eloquent_relationship_13_1']);
// Eloquent many-to-many 
Route::get('/relations-eloquent-13-2', [controllerLecture13::class, 'show_eloquent_relationship_13_2']);

/******************* lecture 14: Collection  ****************************/
/**
 * Laravel Collections là một lớp tiện ích mạnh mẽ được xây dựng trên mảng (array) của PHP, giúp thao tác, xử lý và chuyển đổi dữ liệu một cách linh hoạt và dễ đọc.
 */
use App\Http\Controllers\lecture14\controllerLecture14;
Route::get('/collection-map-14', [controllerLecture14::class, 'collection_map']);
Route::get('/collection-map-14-filter', [controllerLecture14::class, 'collection_filter']);
Route::get('/collection-map-14-except', [controllerLecture14::class, 'collection_except']);
Route::get('/collection-map-14-count', [controllerLecture14::class, 'collection_count']);
Route::get('/collection-map-14-avg', [controllerLecture14::class, 'collection_avg']);
Route::get('/collection-map-14-get', [controllerLecture14::class, 'collection_get']);
Route::get('/collection-map-14-sort-by', [controllerLecture14::class, 'collection_sort_by']);
Route::get('/collection-map-14-sort-by-desc', [controllerLecture14::class, 'collection_sort_by_desc']);

/******************* Api ****************************/
/**
 * Tạo Resource Controllers: trong routes/api.php
 * Cách 1 - Tạo controller bằng lệnh: php artisan make:controller [tên thư mục]/[tên controller] --api
 * Cách 2 - Tạo controller có model bằng lệnh: php artisan make:controller [tên thư mục]/[tên controller] --api --model=[tên thư mục]/[tên model]
 */

/******************* connect api wp ****************************/
use App\Http\Controllers\wpConnectApi\wpConnectApi;
Route::get('/wp-api', [wpConnectApi::class,'getWpApi']);

// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');