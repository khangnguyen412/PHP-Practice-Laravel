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
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "show-name":
                    /**
                     *  Lấy dữ liệu của field chỉ đinh
                     */
                    $result = json_encode($request->input('username'), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "show-method":
                    /**
                     *  Kiểm tra phương thức gửi
                     */
                    if ($request->isMethod('post')) {
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
                     *  Trả về mỗi giá trị của key thuộc only (có thể lấy ra nhiều phần tử) 
                     */
                    $result = json_encode($request->only(['username', 'email']), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "show-with-input":
                    /**
                     *  Trả về mỗi giá trị của key với giá trị mặc đinh nếu field đó rỗng
                     */
                    $result = json_encode($request->input('city', 'HCM2'), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "show-with-collection":
                    /**
                     *  Kết hợp với collection();
                     */
                    $input = $request->collect();
                    $result = json_encode($input->take(2)->toArray(), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "show-ip":
                    /**
                     *  Trả về IP request form
                     */
                    return "IP: " . $request->ip();
                    break;

                /******************* Laravel 8.0 (bổ sung) ****************************/
                case "current-url":
                    /**
                     *  Lấy url hiện tại (bao gồm cả domain)
                     */
                    return "Url: " . $request->url();
                    break;
                case "current-full-url":
                    /**
                     *  Lấy url hiện tại (bao gồm cách tham số sau ?param= )
                     */
                    return "Full Url: " . $request->fullUrl();
                    break;
                case "method":
                    /**
                     *  Lấy phương thức hiện tại
                     */
                    return "Method: " . $request->method();
                    break;
                case "current-header":
                    /**
                     *  Lấy ra user-agent của reuquest.
                     */
                    return "Header: " . $request->header('user-agent');
                    break;
                case "query-string":
                    /**
                     *  Lấy dữ liệu query string (tham số trên thanh url)
                     */
                    $result = json_encode($request->query(), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "query-string-name":
                    /**
                     *  Nhận dữ liệu query string có tham số 'query-string'
                     */
                    $result = json_encode($request->query('query-string'), JSON_UNESCAPED_UNICODE);
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "has-name":
                    /**
                     *  Kiểm tra có field name hay ko
                     */
                    $result = $request->has('username')? 'Has username' : 'Notfound username';
                    return response($result)->header('Content-type', 'application/json; charset=UTF-8');
                    break;
                case "flash-name":
                    /**
                     *  Lưu field username vào session để gọi từ view  
                     */
                    $result = $request->flash('username');
                    return redirect()->back();
                    break;
                default:
                    return "Sai phương thức";
            }
        } else {
            return $request->all();
        }
    }
}
