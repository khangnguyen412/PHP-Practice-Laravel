<?php

namespace App\Http\Controllers\Lecture12;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Gọi namespace của model
use App\Models\lecture12\ModelLecture12;
use Illuminate\Support\Facades\Redirect;

class ControllerLecture12 extends Controller
{
    public function test()
    {
        $get_function = new ModelLecture12(); // Khai báo model trong controller 
        $get_first_models = $get_function->getFormModel(); // Gọi getInfo() từ models
        return $get_first_models;
    }

    /**
     * - Lấy tất cả dữ liệu từ database từ Model
     * cú pháp: 
     *      [tên class]::all();
     * - [tên class] là đối tượng model được gọi tới
     */
    public function get_data()
    {
        $data = ModelLecture12::all();
        return view('lecture12.view-lecture12', ['data' => $data]);

    }

    /**
     * - Lấy duy nhất 1 dòng data thông qua khóa chính từ Model
     * cú pháp: 
     *      [tên class]::find([id khóa chính]);
     * - [id khóa chính] là stt khóa chính trên db
     * * lưu ý: khai báo biến $primaryKey để xác định khóa chính cho bản
     */
    public function get_by_primary_key(Request $data)
    {
        $data = ModelLecture12::find(2);
        // Hoặc 
        // $data = [tên class]::take(2)->get();
        // Nhưng take sẽ lấy luôn 2 dòng trong dữ liệu

        // Trả kết quả về view
        return view('lecture12.view-lecture12', ['data' => $data]);
    }

    /**
     * - Truy vấn data theo điều kiện
     * cú pháp: 
     *      [tên class]::where('[column]', '[condition]', '[filter]')->get();
     * - [column] cột được truy vấn 
     * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
     * - [filter] vế sau của điều kiện 
     */
    public function get_by_condition()
    {
        $data = ModelLecture12::where('ACCOUNT_ID', 5)->get();
        return view('lecture12.view-lecture12', ['data' => $data]);
    }

    /**
     * - Truy vấn data theo cột
     * cú pháp: 
     *      [tên class]::select('[column1]', ..., '[columnN]')->get();
     * - [column1], [columnN] cột được truy vấn 
     */
    public function get_by_column()
    {
        $data = ModelLecture12::select('ACCOUNT_ID', 'AVAIL_BALANCE', 'LAST_ACTIVITY_DATE', 'PRODUCT_CD')->get();
        return view('lecture12.view-lecture12', ['data' => $data]);
    }

    /**
     * - Đếm data trong bảng 
     * cú pháp: 
     *      [tên class]::all()->count();
     */
    public function count_data()
    {
        $data = ModelLecture12::all()->count();
        return view('lecture12.view-lecture12', ['data' => $data]);
    }

    /**
     * - Thêm dữ liệu vào bảng
     * - Add qua model: https://www.fundaofwebit.com/laravel-8/how-to-insert-data-in-laravel-8
     */
    public function add_data(Request $request)
    {
        $data = ModelLecture12::find(30);
        if ($data != NULL) {
            $data =  "user exist";
        } else {
            $data = new ModelLecture12();
            $data->ACCOUNT_ID = '30';
            $data->AVAIL_BALANCE = 6001;
            $data->CLOSE_DATE = NULL;
            $data->LAST_ACTIVITY_DATE = '2004-12-17';
            $data->OPEN_DATE = '2004-12-15';
            $data->PENDING_BALANCE = 6000;
            $data->STATUS = 'ACTIVE';
            $data->CUST_ID = 10;
            $data->OPEN_BRANCH_ID = 1;
            $data->OPEN_EMP_ID = 1;
            $data->PRODUCT_CD = 'CD';
            $data->save();
        }
        return view('lecture12.view-lecture12', ['data' => $data]);
    }

    /**
     * - Cập Nhật dữ liệu bảng
     */
    public function update_data(Request $request)
    {
        $data = ModelLecture12::find(30);
        if ($data != NULL) {
            $data->AVAIL_BALANCE = 6002;
            $data->save();
        }else{
            $data = "user doesn't exist";
        }
        return view('lecture12.view-lecture12', ['data' => $data]);
    }

    /**
     * - Xóa dữ liệu vào bảng
     */
    public function delete_data(Request $request)
    {
        $data = ModelLecture12::find(30);
        if ($data != NULL) {
            $data->delete();
            $data = ModelLecture12::all();
        } else {
            $data =  "user doesn't exist";
        }
        return view('lecture12.view-lecture12', ['data' => $data]);
    }
}
