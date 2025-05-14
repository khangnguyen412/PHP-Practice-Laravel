<?php

namespace App\Http\Requests\LectureExt;

use App\Rules\ValidCustomRule;
use Illuminate\Foundation\Http\FormRequest;

class RequestFormExt extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username'  =>  ['required', 'min:6', 'max:50', new ValidCustomRule],
        ];
    }

    /**
     *  Thông báo lỗi
     */
    public function messages()
    {
        return [
            'require'   => ':attributes không được để trống',
            'min'       => ':attributes không được ít hơn 6 kí tự',
            'max'       => ':attributes không được quá 50 kí tự'
        ];
    }

    /**
     *  Thuộc tính
     */
    public function attributes()
    {
        return [
            'username'  => 'Tên đăng nhập',
        ];
    }


}
