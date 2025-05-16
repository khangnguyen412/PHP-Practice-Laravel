<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\lecture12\ModelLecture12;

/******************* Lecture 22: Pagination ****************************/
/** Đối với query builder */
Route::get('/pagi-query-builder-test', function(){
    $user_pagi = DB::table('laravelweb_pages')->paginate(10);
    return response()->json([
        'message'           => "Thành công ",
        'data'              => $user_pagi,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
});

/** Đối với ORM */
Route::get('/pagi-eloquent-test', function(){
    $user_pagi = ModelLecture12::paginate(10);
    return response()->json([
        'message'           => "Thành công ",
        'data'              => $user_pagi,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
});

/** Đổi phân trang dưới dạng /page/{page} */
Route::get('/pagi-custom-test/page/{page}', function(Request $request){
    $page = $request->route('page', 1); // Lấy page từ route
    $user_pagi = ModelLecture12::forPage($page, 10)->get();
    $user = new LengthAwarePaginator($user_pagi, ModelLecture12::count(), 10, $page, ['path' => '/pagi-custom-test/page']);
    return response()->json([
        'message'           => "Thành công ",
        'data'              => $user,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
});