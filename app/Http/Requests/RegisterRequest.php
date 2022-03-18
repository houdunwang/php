<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => ['required', $this->account()],
            'password' => 'required|min:3'
        ];
    }

    protected function account()
    {
        return function ($attribute, $value, $fail) {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^\d{11}$/', $value)) {
                $fail('帐号格式错误');
            }
        };
    }
}
