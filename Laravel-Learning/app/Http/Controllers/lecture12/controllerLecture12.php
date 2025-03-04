<?php

namespace App\Http\Controllers\lecture12;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Gọi namespace của model
use App\Models\lecture12\modelLecture12;
use Illuminate\Support\Facades\Redirect;

class controllerLecture12 extends Controller
{
    public function test()
    {
        $getFunction = new modelLecture12; // Khai báo model trong controller 
        $getFirstModels = $getFunction->getFormModel(); // Gọi getInfo() từ models
        return $getFirstModels;
    }

    /**
     * - Lấy tất cả dữ liệu từ database từ Model
     * cú pháp: 
     *      [tên class]::all();
     * - [tên class] là đối tượng model được gọi tới
     */
    public function getData()
    {
        $data = modelLecture12::all();
        return view('lecture12.viewLecture12', ['data' => $data]);

    }

    /**
     * - Lấy duy nhất 1 dòng data thông qua khóa chính từ Model
     * cú pháp: 
     *      [tên class]::find([id khóa chính]);
     * - [id khóa chính] là stt khóa chính trên db
     * * lưu ý: khai báo biến $primaryKey để xác định khóa chính cho bản
     */
    public function getByPrimaryKey(Request $data)
    {
        $data = modelLecture12::find(2);
        // Hoặc 
        // $data = modelLecture12::take(2)->get();
        // Nhưng take sẽ lấy luôn 2 dòng trong dữ liệu

        // Trả kết quả về view
        return view('lecture12.viewLecture12', ['data' => $data]);
    }

    /**
     * - Truy vấn data theo điều kiện
     * cú pháp: 
     *      [tên class]::where('[column]', '[condition]', '[filter]')->get();
     * - [column] cột được truy vấn 
     * - [condition] là các toán tử > < <> "like" lần lượt là lớn, bé, bằng 
     * - [filter] vế sau của điều kiện 
     */
    public function getByCondition()
    {
        $data = modelLecture12::where('ACCOUNT_ID', 5)->get();
        return view('lecture12.viewLecture12', ['data' => $data]);
    }

    /**
     * - Truy vấn data theo cột
     * cú pháp: 
     *      [tên class]::select('[column1]', ..., '[columnN]')->get();
     * - [column1], [columnN] cột được truy vấn 
     */
    public function getByColumn()
    {
        $data = modelLecture12::select('ACCOUNT_ID', 'AVAIL_BALANCE', 'LAST_ACTIVITY_DATE', 'PRODUCT_CD')->get();
        return view('lecture12.viewLecture12', ['data' => $data]);
    }

    /**
     * - Đếm data trong bảng 
     * cú pháp: 
     *      [tên class]::all()->count();
     */
    public function countData()
    {
        $data = modelLecture12::all()->count();
        return view('lecture12.viewLecture12', ['data' => $data]);
    }

    /**
     * - Thêm dữ liệu vào bảng
     * - Add qua model: https://www.fundaofwebit.com/laravel-8/how-to-insert-data-in-laravel-8
     */
    public function addData(Request $request)
    {
        $data = modelLecture12::find(30);
        if ($data != NULL) {
            $data =  "user exist";
        } else {
            $data = new modelLecture12();
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
        return view('lecture12.viewLecture12', ['data' => $data]);
    }

    /**
     * - Cập Nhật dữ liệu bảng
     */
    public function updateData(Request $request)
    {
        $data = modelLecture12::find(30);
        if ($data != NULL) {
            $data->AVAIL_BALANCE = 6002;
            $data->save();
        }else{
            $data = "user doesn't exist";
        }
        return view('lecture12.viewLecture12', ['data' => $data]);
    }

    /**
     * - Xóa dữ liệu vào bảng
     */
    public function deleteData(Request $request)
    {
        $data = modelLecture12::find(30);
        if ($data != NULL) {
            $data->delete();
            $data = modelLecture12::all();
        } else {
            $data =  "user doesn't exist";
        }
        return view('lecture12.viewLecture12', ['data' => $data]);
    }
}
