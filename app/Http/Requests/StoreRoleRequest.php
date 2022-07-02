<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => ['required',  $this->unique('title'),],
            'name' => ['required', 'regex:/^\w+$/i', $this->unique('name')],
        ];
    }

    protected function unique($field)
    {
        return Rule::unique('roles', $field)
            ->where(function ($query) {
                $query->where('site_id', request('site.id'))
                    ->when(request('role.id'), function ($query, $id) {
                        $query->where('id', '!=', $id);
                    });
            });
    }
    public function messages()
    {
        return ['name.regex' => '角色标识只能是英文字母'];
    }
}
