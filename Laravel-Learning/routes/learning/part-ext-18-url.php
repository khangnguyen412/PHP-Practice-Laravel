<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LectureExt\ControllerLectureExt;

/******************* Lecture 18: Url ****************************/
/**
 *  - url(): 
 *      + Một helper function dùng để tạo ra một URL hoàn chỉnh từ một đường dẫn tương đối (relative path)
 *      + Có thể kèm theo các tham số query (nếu có)
 */

Route::get('/url-test', function (){
    return view('lectureExt.view-lecture-ext01');
});

/**
 *  - Signed URL: là một URL có kèm theo một chữ ký (hash) được tạo từ các tham số của URL và một secret key của ứng dụng.
 *  - Tác dụng: 
 *      + Tạm thời chia sẻ đường dẫn
 *      + Xác nhận email không cần đăng nhập
 *      + 
 */
Route::get('/signed-url-test', [ControllerLectureExt::class, 'generate_signed_url'])->name('signed-url-test');
/**
 *  - Tham số được
 */
Route::get('/verify-email/{user_id}', function ($user_id) {
    return "Xác thực email cho user ID: $user_id";
})->name('verify.email');

/**
 *  - Action URL: 
 *      + Là một cách để tạo đường dẫn (URL) dựa trên tên của một controller và action cụ thể
 */
Route::get('/action-url-test', [ControllerLectureExt::class, 'generate_action_url']);