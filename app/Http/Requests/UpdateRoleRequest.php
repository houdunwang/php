<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => ['required', $this->unique('name')],
            'title' => ['required', $this->unique('title')],
        ];
    }

    protected function unique($field)
    {
        return Rule::unique('roles', $field)->where(function ($query) {
            $query->where('site_id', request('site.id'))->when(request('role.id'), function ($query, $id) {
                $query->where('id', '!=', $id);
            });
        });
    }
}
