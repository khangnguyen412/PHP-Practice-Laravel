<?php

namespace App\Http\Controllers\LectureExt;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Lecture12\ControllerLecture12;
use App\Models\lecture12\ModelLecture12;
use App\Models\lecture13\ModelLecture13Post;
use App\Models\lecture13\ModelLecture13Products;

class ControllerLectureExt extends Controller
{
    protected $user_list;

    /**
     *  Nhúng dependency injection (ModelLecture12 $user) trực tiếp vào phương thức khởi tạo
     */
    public function __construct(ModelLecture12 $user)
    {
        $this->user_list = $user;
    }

    public function generate_signed_url(Request $request) {
        /**
         *  - Tạo signed URL cho route vĩnh viễn
         *  - Cú pháp: 
         *      $ URL::signedRoute($name, $parameters, $expiration, $absolute)
         *  - Trong đó:
         *      $name: tên của route 
         *      $parameters: mảng chứa các tham số truyền vào route (nếu route có tham số động).
         *      $expiration: thời gian hết hạn của URL 
         *      $absolute:  trả về URL đầy đủ (true) hay trả về URL tương đối (false) (mặc định là true)
         */
        // Tạo signed URL cho route vĩnh viễn
        $signed_url_permanent = URL::signedRoute('verify.email', ['user_id' => 1]);

        // Tạo signed URL cho route tạm thời
        $expired_signed_url = URL::temporarySignedRoute('verify.email', now()->addHours(1), ['user_id' => 1]);
        return response()->json([
            'signed_url' => $signed_url_permanent,
            'expired_signed_url' => $expired_signed_url,
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    public function generate_action_url(Request $request){
        $get_userlist = URL::action([ControllerLecture12::class, 'get_data']);
        return response()->json([
            'url' => $get_userlist
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function dependency_injection_contructor(){
        $user = $this->user_list->get();
        return response()->json([
            'data' => $user
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }

    /**
     *  - Nhúng dependency injection (ModelLecture13Post $post) trực tiếp vào phương thức
     */
    public function dependency_injection_method(ModelLecture13Post $post){
        $post_list = $post->get();
        return response()->json([
            'data' => $post_list
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
    
    /**
     *  - Nhúng dependency injection (resolve(ModelLecture13Products::get())) trực tiếp vào thuộc tính
     */
    public function dependency_injection_property(){
        $product_list = resolve(ModelLecture13Products::class); // phải có resolve() hoặc app()
        return response()->json([
            'data' => $product_list->get()
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
