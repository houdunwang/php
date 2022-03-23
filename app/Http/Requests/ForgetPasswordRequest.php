<?php

namespace App\Http\Requests;

use App\Rules\ValidateCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'account' => $this->accountRules(),
            'code' => ['required', new ValidateCodeRule],
            'password' => ['required', 'confirmed']
        ];
    }

    protected function accountRules()
    {
        if (filter_var(request('account'), FILTER_VALIDATE_EMAIL)) {
            return ['required', 'email', 'exists:users,email'];
        }
        return ['required', 'regex:/^\d{11}$/', 'exists:users,mobile'];
    }
}
