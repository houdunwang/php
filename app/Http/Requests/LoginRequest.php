<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account' => $this->accountRule(),
            'password' => 'required|min:3'
        ];
    }

    protected function accountRule(): array
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return ['required', 'email'];
        }

        return ['required', 'regex:/^\d{11}$/'];
    }
}
