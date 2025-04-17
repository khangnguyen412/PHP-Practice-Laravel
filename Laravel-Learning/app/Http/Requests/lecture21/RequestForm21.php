<?php

namespace App\Http\Requests\Lecture21;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RequestForm21 extends FormRequest
{
    /**
     *  * LƯU Ý: các hàm sau là mặc định ko đc thay đổi tên, nếu đổi tên sẽ ko hoạt động
     *      + authorize()
     *      + rules() 
     *      + messages()
     *      + attributes()
     *      + failedValidation()
     */

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // setup giá trị về true để thực hiện chức năng validations
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'      => 'required|min:5|max:255',
            'email'         => 'required|email',
            'phone'         => 'required|numeric',
            'city'          => 'required|max:255',
        ];
    }

    /**
     *  - Hàm xác định thông báo nếu field có lỗi
     */
    public function messages()
    {
        return [
            'required'      => ':attribute không được để trống',
            'min'           => ':attribute không được nhập ít hơn :min',
            'max'           => ':attribute không được nhập nhiêu hơn :max',
            'integer'       => ':attribute chỉ được nhập số',
        ];
    }

    /**
     *  - Hàm setup lại cái tên mới cho dữ liệu trả về
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     *  - Hàm trả về kết quả nếu valid_fail
     *  - 
     */
    protected function failedValidation(Validator $validator)
    {
        $valid_result = [
            'status'  => 'error',
            'message' => 'Validation failed',
            'errors'  => $validator->errors()
        ];
        // Nếu là API, trả về JSON với cấu trúc lỗi tùy chỉnh:
        throw new HttpResponseException(response()->json($valid_result, 422, [], JSON_UNESCAPED_UNICODE));
    }
}
