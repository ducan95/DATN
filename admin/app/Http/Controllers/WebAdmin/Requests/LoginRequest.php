<?php

namespace App\Http\Controllers\WebAdmin\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'txtEmail'    => 'required',
            'txtPassword' => 'required'
        ];
    }

    /**
     * customize msg error
     * @return array
     */
    public function messages()
    {
        return [
            'txtEmail.required'    => 'Vui lòng nhập địa chỉ e-mail của bạn',
            'txtPassword.required' => 'Vui lòng nhập mật khẩu'
        ];
    }
}
