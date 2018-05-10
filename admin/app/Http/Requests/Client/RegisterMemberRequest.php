<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMemberRequest extends FormRequest
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
            'email'    => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'Vui lòng nhập địa chỉ email của bạn',
            'password.required' => 'Vui lòng nhập password'
        ];
    }
}
