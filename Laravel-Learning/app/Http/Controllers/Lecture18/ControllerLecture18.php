<?php

namespace App\Http\Controllers\Lecture18;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ControllerLecture18 extends Controller
{
    public function get_form()
    {
        return view('lecture18.view-lecture18');
    }

    public function handle_request(Request $request)
    {
        $category = $request->get('category');
        if (!empty($category)) {
            switch ($category) {
                case "show-all":
                    /**
                     *  Lấy dữ liệu của form
                     */
                    $result = json_encode($request->all(), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type','application/json; charset=UTF-8'); 
                    break;
                case "show-name":
                    /**
                     *  Lấy dữ liệu của field chỉ đinh
                     */
                    $result = json_encode($request->get('username'), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type','application/json; charset=UTF-8'); 
                    break;
                case "show-method":
                    /**
                     *  Kiểm tra phương thức gửi
                     */
                    if($request->isMethod('post')){
                        return "Đây là phương thức post";
                    }
                    break;
                case "show-path":
                    /**
                     *  Lấy path của form
                     */
                    return $request->path();
                case "show-with-only":
                    /**
                     *  Trả về mỗi giá trị của key thuộc only
                     */
                    $result = json_encode($request->only(['username']), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type','application/json; charset=UTF-8'); 
                    break;
                case "show-with-input":
                    /**
                     *  Trả về mỗi giá trị của key với giá trị mặc đinh nếu field đó rỗng
                     */
                    $result = json_encode($request->input('city', 'HCM2'), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type','application/json; charset=UTF-8'); 
                    break;
                case "show-with-collection":
                    /**
                     *  Kết hợp với collection();
                     */
                    $input = $request->collect();
                    $result = json_encode($input->take(2)->toArray(), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type','application/json; charset=UTF-8'); 
                    break;
                case "show-ip":
                    /**
                     *  Trả về IP request form
                     */
                    return "IP: " . $request->ip();
                    break;
                default:
                    return "sai phương thức";
            }
        } else {
            return $request->all();
        }
    }
}
