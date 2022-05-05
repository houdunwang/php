<?php

namespace App\Http\Requests;

use App\Rules\ValidateCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'password' => ['required', 'min:3', 'confirmed'],
            'code' => ['bail', new ValidateCodeRule]
        ];
    }

    protected function accountRule()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL))
            return ['bail', 'required', 'email', 'unique:users,email'];

        return ['bail', 'required', 'regex:/^\d{11}$/', 'unique:users,mobile'];
    }

    public function messages()
    {
        return ['code.required' => '验证码不能为空'];
    }
}
