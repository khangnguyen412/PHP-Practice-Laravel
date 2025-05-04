<?php

/******************* Gọi Thư Viện ****************************/

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // thư viện nhận tham số cho form post

/**
 *  Các Loại Route:
 *  Route::get
 *  Route::post 
 *  Route::put
 *  Route::delete
 *  Route::match         kết hợp nhiều phương phức như POST,GET,PUT,..
 *  Route::any           nhận tất cả các phương thức.
 *  Route::group         tạo ra các nhóm route.
 *  Route::controller    gọi đến controller tương ứng mà chúng ta tự định.
 *  Route::resource      sử dụng với resource controller.
 * 
 *  Các route mà Laravel có hỗ trợ thêm:
 *  Route::redirect      dùng để chuyển hướng đường dẫn
 *  Route::view          Thay đổi và hiển thị view được chỉ định
 *  Route::prefix        Dùng tiền tố của đường dẫn
 */

/******************* Lecture 3: Route (part1) ****************************/
/**
 *  Route::get
 *  Cú pháp:
 *      $ Route::get('url', $action);
 *  Trong Đó:
 *      -> 'url' là đường dẫn trên web
 *      -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
// Gọi tới đường dẫn '/helloWorld' sẽ thực hiện 1 function ở phía sau
Route::get('/hello-world', function () {
    return 'This is framework Laravel';
});
// Gọi tới đường dẫn '/testGetRoute' chính sẽ được chuyển tới views/lecture03/testGetRoute.blade.php
Route::get('/test-route-get', function () {
    return view('lecture03.test-route-get');
});


/**
 *  Route::post
 *  Tương tự như get nhưng khác nhau:
 *  - get có thể gọi trực tiếp từ url còn post chỉ đc gọi form
 * 
 *  Cú pháp:
 *      $ Route::post('url', $action);
 *  Trong Đó:
 *      -> 'url' là đường dẫn trên web
 *      -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
// Tạo 1 form nhập dữ liệu có method post tại file views/lecture03/getFormPost.blade.php
// Trong form sẽ có phương thức post vào gọi tới url /testPostRoute
Route::get('/get-post-form', function () {
    return view('lecture03.get-post-form');
});
// Gọi tới đường dẫn '/testPostRoute' sẽ thực hiện 1 function ở phía sau nhưng sử dụng post
Route::post('/test-route-post', function (Request $arr) {
    $name = $arr->input('name');
    return "test method post của laravel và post có tham số là $name";
});
// Để post sử dụng thư viện Request và nhận tham số của $arr

/**
 *  Route::match
 *  Chấp nhập tất cả phương thức được khai báo
 * 
 *  Cú pháp:
 *      $ Route::match([method], 'url', $action);
 *  Trong đó:
 *      -> [method] là phương thức có thể sử dụng trong route này
 *      -> 'url' là đường dẫn trên web
 *      -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
Route::get('/get-match-form', function () {
    return view('lecture03.get-match-form');
});
Route::match(['get', 'post'], '/test-route-match', function (Request $arr) {
    $param1 = $arr->input('name');
    if (isset($param1)) {
        return "đã gọi vào thành công method match và kèm theo tham số $param1";
    }
    return 'đã gọi vào thành công method match';
});
// Khi gọi trực tiếp tới url /testMatchRoute trên thanh url của gg, match nhận method get
// Khi gọi nhập số từ url /getFormMatch và submit, match nhận method post

/**
 *  Route::any
 *  Chấp nhập tất cả phương thức
 * 
 *  Cú pháp:
 *      $ Route::any('url', $action);
 *  Trong đó:
 *      -> 'url' là đường dẫn trên web
 *      -> $action là một câu lệnh hoặc hàm nào đó khi được gọi tới đường dẫn trùng với $url
 */
Route::any('/test-route-any', function () {
    return 'đây là route any';
});


/******************* Lecture 4: Route (part2) ****************************/
/**
 *  Route::resource(): Là một chức năng giúp chúng ta xây dựng RESTful(websevice) một cách nhanh chóng.
 * 
 *  Cú pháp:
 *      $ Route::resource('url', 'tencontroller', $tuybien);
 *  Trong đó:
 *      -> 'url' là đường dẫn trên web
 *      -> 'tencontroller' là tên của controller (không đi kèm đuôi .php).
 *      -> $tuybien là các tùy biến phương thức được sử dụng trong Route, Tham số này có thể bỏ qua nếu không cần thiết.
 *  * lưu ý: Để sử dụng được Route::resource() thì cần phải tạo ra một RESTful Controller và import ctrler vào đây
 * 
 *  Để dùng route::resource tạo restful ta dùng lệnh:    php artisan make:controller TenController --resource
 *  Trong đó: 
 *      -> TenController là tên của controller bạn muốn tạo
 */
use App\Http\Controllers\Lecture04\ControllerLecture04; // Gọi controller từ lecture04\ControllerLecture04
/**
 *  - Nhận menthod index() từ controler
 *  - Gọi  url /getRouteResource để nhận method index()
 */
Route::resource('/get-route-resource', ControllerLecture04::class);
/**
 *  - Ngoài ra có thể dùng tùy biến [only] để lọc các method()
 *  - Ví dụ: ControllerLecture04::class, ['only' => ['create', 'show', 'edit']]) => chỉ nhận 3 method create(), show(). edit()
 *  - Gọi url /getRouteResource/create để nhận method create()
 *  - Gọi url /getRouteResource/{something} để nhận method show()
 *  - Gọi url /getRouteResource/{something}/edit để nhận method edit()
 *  - Gọi url /getRouteResource/ trong menthod post của form để nhận method store()
 *  - Gọi url /getRouteResource/{something} để nhận method update()
 *  - Gọi url /getRouteResource/{something} để nhận method destroy()
 */
Route::resource('/get-route-resource-only', ControllerLecture04::class, ['only' => ['create', 'show', 'edit']]);
/**
 *  - Cấm method index(), gọi vào sẽ xuất lỗi
 *  - Gọi url /get-route-resource-except => nhận lỗi MethodNotAllowedHttpException
 */
Route::resource('/get-route-resource-except', ControllerLecture04::class, ['except' => ['index']]);
/**
 *  - Truyền tham số thêm vào route resource
 *  - Gọi url /get-route-resource-with-param/{param1}/author/{param2}
 */ 
Route::resource('/get-route-resource-with-param.author', ControllerLecture04::class);
/**
 *  *Lưu ý: ['only']['except'] Chỉ sử dụng được với cái phương thức mà controller tạo sẳn, ko sử dụng được với phương thức khác
 *  - Các phương thức tạo sẵn: 
 *      + GET	    /resource           index()
 *      + GET	    /resource/create    create()
 *      + POST	    /resource           store()
 *      + GET	    /resource/{id}      show()
 *      + GET	    /resource/{id}/edit	edit()
 *      + PUT/PATCH	/resource/{id}      update()
 *      + DELETE	/resource/{id}      destroy()
 */

/**
 *  Route::group(): Là một cách để nhóm các route lại với nhau, giúp bạn tổ chức mã nguồn một cách gọn gàng và cấu trúc.
 *  Điều này giúp quản lý và duy trì các route dễ dàng hơn, đặc biệt là khi bạn có nhiều route liên quan đến nhau.
 *  Ví dụ: admin/...
 * 
 *  Cú pháp:
 *      $ Route::group($attr, $handle);
 *  Trong đó
 *      - $attr là các mãng thành phần điều kiện
 *      - $handle là các câu lệnh hoặc hàm thực hiện chức năng cho route đó
 */
// Sử dụng route::group(prefix)
Route::group(['prefix' => '/test-route-group'], function () {
    Route::get('get', function () {
        return view("lecture04.test-route-group");
    });
    Route::get('return', function () {
        return 'đây là phần tử của route group';
    });
});
// Sử dụng route::controller()
Route::controller(ControllerLecture04::class)->group(function () {
    Route::get('/get-route-grp-with-ctrl/{param}', 'group');
    Route::get('/get-route-grp-with-ctrl', 'group');
});


/**
 *  Route::prefix(): Nhóm các route có cùng đường dẫn tiền tố 
 *  Ví dụ: admin/...
 * 
 *  Cú pháp:
 *      $ Route::prefix('[prefix/]')->group($handle);
 *  Trong đó
 *      - [prefix/] là tiền tố của đường dẫn, ví dụ: prefix/admin, prefix/user, prefix/...
 *      - $handle là các câu lệnh hoặc hàm thực hiện chức năng cho route đó
 */
Route::prefix('/test-route-prefix')->group(function () {
    Route::get('get', function () {
        return view("lecture04.test-route-group");
    });
});


/**
 *  Route::redirect()
 *  Cho phép chuyển hướng đường dẫn khác khi được gọi tới đường đẫn được chỉ định
 * 
 *  Cú Pháp:
 *      $ Route::redirect('[URI1]', '[URI2]', $status);
 *  Trong đó
 *      - [URI1] là các đường dẫn của route khi gọi tới
 *      - [URI2] là các đường dẫn của route sẽ được chuyển hướng tới sau khi gọi 
 *      - $status là trang thái của route khi gọi tới
 */
Route::redirect('/test-route-redirect', 'test-redirect', 301);
Route::get('/test-redirect', function () {
    return view('lecture04.test-route-redirect');
});


/******************* Lecture 5: Route (part3) ****************************/
// Truyền biến vào route
Route::get('/put-args-to-route/{param}', function ($param) {
    return view('lecture05.put-args-to-route', ['param' => $param]);
    /**
     * {param} là tham số được truyền vào route
     * truyền thêm tham số name trong mãng ['name' => $name] vào view
     * nếu view có đường dẫn / thì dùng dấu . để phân cách 
     */
});
// Truyền nhiều tham số vào route
Route::get('/put-args-to-route/{param1}/{param2}', function ($param1, $param2) {
    return view('lecture05.put-args-to-route2', ['param1' => $param1, "param2" => $param2]);
});
// Truyền biến vào route có điều kiện, nếu đk không đúng => not found
Route::get('/put-args-in-route-with-condition/{param1}/{param2}', function ($param1, $param2) {
    return view('lecture05.put-args-to-route2', ['param1' => $param1, "param2" => $param2]);
})->where(['param1' => '[a-z]+', 'param2' => '[0-9]+']);