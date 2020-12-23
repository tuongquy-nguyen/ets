<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'bail|required|confirmed:repassword|string',
            'repassword' => 'bail|min:8'
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Mật khẩu phải có độ dài hơn 8 ký tự',
            'password.confirm' => 'Mật khẩu nhập vào không khớp',
        ];
    }
}
