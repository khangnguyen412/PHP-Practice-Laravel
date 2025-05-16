<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\lecture12\ModelLecture12;
use App\Models\lecture13\ModelLecture13Post;
use App\Models\lecture13\ModelLecture13Categories;
use App\Models\lecture13\ModelLecture13UserProfiles;

/******************* Lecture 30: Query with eloquent ****************************/
/**
 *  - Query với eloquent có thể coi nó như một bản nâng cấp của query builder với nhiều tính năng hay ho hơn.
 */
/**
 *  Lấy hết bản ghi
 */
Route::get('/test-eloquent-query-get', function () {
    $user_list = ModelLecture12::all();
    return response()->json([
        'data' => $user_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy giới hạn bản ghi dựa trên tham số của take()
 */
Route::get('/test-eloquent-query-get-10', function () {
    $user_list = ModelLecture12::take(10)->get();
    return response()->json([
        'data' => $user_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy bản ghi theo điều kiện
 */
Route::get('/test-eloquent-query-condition', function () {
    $user_list = ModelLecture12::where("user_id", 13)->get();
    return response()->json([
        'data' => $user_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy bản ghi đầu tiên
 */
Route::get('/test-eloquent-query-first', function () {
    $user_list = ModelLecture12::all()->first();
    return response()->json([
        'data' => $user_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Kết hợp collect trong query với eloquent
 */
Route::get('/test-eloquent-query-colection', function () {
    /**
     *  Các hàm thường sử dụng:
     *      + get()
     *      + first()
     *      + count()
     *      + sum()
     *      + avg()
     *      + min()/max()
     */
    $user_count = ModelLecture12::all()->count();
    return response()->json([
        'data' => $user_count,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy bản ghi với giới hạn chunk()
 */
Route::get('/test-eloquent-query-chunk', function () {
    $arr = [];
    ModelLecture12::chunk(4, function ($users) use (&$arr) {
        foreach ($users as $user) {
            $arr[] = $user;
        }
        if (count($arr) >= 4) {
            return false; // Dừng vòng lặp chunk
        }
    });
    return response()->json([
        'data' => $arr,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy bản ghi với subquery
 */
Route::get('/test-eloquent-query-sub', function () {
    $post_list = ModelLecture12::whereIn('user_id', function ($query) {
        $query->select('user_id')->from('laravelweb_posts')->where('title', 'Healthy Breakfast Ideas');
    })->get();
    return response()->json([
        'data' => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Tạo bản ghi (insert)
 */
Route::get('/test-eloquent-query-create', function () {
    $data = [
        'title'             => 'Testimonials Test',
        'slug'              => 'testimonials-test',
        'meta_title'        => 'Testimonials',
        'meta_description'  => 'What our clients say',
        'body'              => 'This is the testimonials page...',
        'canonical_url'     => 'https://example.com/testimonials',
        'user_id'           => 3,
        'created_at'        => now(),
        'updated_at'        => now()
    ]; // $data phải khớp với $fillable trong model
    ModelLecture13Post::create($data);
    $post_list = ModelLecture13Post::all();
    return response()->json([
        'data' => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Tạo bản ghi (insert) hoặc cập nhật (update) bản ghi
 */
Route::get('/test-eloquent-query-save', function () {
    $post = new ModelLecture13Post();
    $post->title = 'Testimonials Test';
    $post->slug = 'testimonials-test';
    $post->meta_title = 'Testimonials';
    $post->body = 'This is the testimonials page...';
    $post->canonical_url = 'https://example.com/testimonials ';
    $post->user_id = 3;
    /**
     *  created_at & updated_at nếu public $timestamps = true trong model
     */
    $post->save();
    $post_list = ModelLecture13Post::all();
    return response()->json([
        'data' => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy bản ghi (select) nếu ko có thì tạo (create) bản ghi 
 */
Route::get('/test-eloquent-query-first-or-create', function () {
    $find = ['slug' => 'testimonials-test'];
    $data = [
        'title'             => 'Testimonials Test',
        'slug'              => 'testimonials-test',
        'meta_title'        => 'Testimonials',
        'meta_description'  => 'What our clients say',
        'body'              => 'This is the testimonials page...',
        'canonical_url'     => 'https://example.com/testimonials',
        'user_id'           => 3,
        'created_at'        => now(),
        'updated_at'        => now()
    ]; // $data phải khớp với $fillable trong model
    ModelLecture13Post::firstOrCreate($find, $data);
    $post_list = ModelLecture13Post::all();
    return response()->json([
        'data' => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Lấy bản ghi (select), nếu ko có tạo một instance và lưu tạm ko lưu lập tức trên DB
 */
Route::get('/test-eloquent-query-first-or-new', function () {
    $find = ['slug' => 'testimonials-test'];
    $post = ModelLecture13Post::firstOrNew($find); // Nếu chưa tồn tại thì trả về cho instance $post 
    if (!$post->exist) {
        $post->title = 'Testimonials Test';
        $post->slug = 'testimonials-test';
        $post->meta_title = 'Testimonials';
        $post->body = 'This is the testimonials page...';
        $post->canonical_url = 'https://example.com/testimonials ';
        $post->user_id = 3;
        $post->save();
    }
    $post_list = ModelLecture13Post::all();
    return response()->json([
        'old-data'  => $post,
        'data'      => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});


/**
 *  Cập nhật bản ghi (update) nếu ko có thì tạo (create) bản ghi 
 */
Route::get('/test-eloquent-query-update-or-create', function () {
    $find = ['slug' => 'testimonials-test'];
    $data = [
        'title'             => 'Testimonials Test',
        'slug'              => 'testimonials-test',
        'meta_title'        => 'Testimonials',
        'meta_description'  => 'What our clients say',
        'body'              => 'This is the testimonials page...',
        'canonical_url'     => 'https://example.com/testimonials',
        'user_id'           => 4,
        'created_at'        => now(),
        'updated_at'        => now()
    ]; // $data phải khớp với $fillable trong model
    ModelLecture13Post::updateOrCreate($find, $data);
    $post_list = ModelLecture13Post::all();
    return response()->json([
        'data' => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Xóa bản ghi (delete)
 */
Route::get('/test-eloquent-query-delete', function () {
    $find = ['slug' => 'testimonials-test'];
    $post = ModelLecture13Post::where($find);
    $post->delete();
    $post_list = ModelLecture13Post::all();
    return response()->json([
        'data' => $post_list,
    ], 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
});

/**
 *  Soft Delete
 *  - Skip do bảng ko có cột deleted_at (timestamp, nullable)
 */
Route::get('/test-eloquent-query-soft-delete', function () {});
