<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/******************* Lecture 19: Session ****************************/
/**
 *  - Session: 
 *      + Một cơ chế để lưu trữ dữ liệu tạm thời trên server
 *      + Kết hợp với mỗi người dùng (user) trong suốt quá trình họ tương tác với ứng dụng
 *  - Cú pháp: 
 *      $ session($key, $default)
 *  - Trong đó: 
 *      + $key: khóa session
 *      + $default: giá trị mặc định nếu ko có
 */
Route::get('/session-test', function () {
    session(['user-name' => 'Khang Nguyen']);
    return 'đã gửi';
});
Route::get('session-check', function () {
    // Kiểm tra và lấy giá trị từ session()
    $user_name = session('user-name', 'Guest');
    return 'đã đăng nhập với: ' . $user_name;
});

/**
 *  - Session Flash: 
 *      + Là dữ liệu chỉ tồn tại trong một lần request tiếp theo
 *      + Thường được dùng để hiển thị thông báo thành công
 */
Route::get('/session-flash-test', function () {
    Session::flash('success', 'Thông tin đã được cập nhật thành công!');
    return view('lectureExt.view-lecture-ext02');
});

/**
 *  - Lấy session có sẵn hoặc tạo mới nếu chưa có
 */
Route::get('/session-add-test/{name}', function ($name) {
    $list = Session::get('user-list', []); // session có sẵn hoặc tạo mới nếu chưa có
    $list[] = $name; // add thêm vào mãng
    Session::put('user-list', $list); // lưu mãng mới
    return 'đã thêm';
});
Route::get('/session-add-check', function () {
    return response()->json([
        'data' => Session::get('user-list', []),
    ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
});

/**
 *  - Lấy session có sẵn hoặc tạo mới nếu chưa có
 */
Route::get('/session-has-check', function () {
    if(Session::has('user-name')){
        $user = Session::get('user-name');
        return "Chào mừng, " . $user;
    }else{
        return 'Ko có session này';
    }
});

/**
 *  - Xóa tất cả dữ liệu session 
 */
Route::get('/session-flush-test', function(){
    Session::flush();
    return "Bạn đã xóa tất cả dữ liệu session ";
});