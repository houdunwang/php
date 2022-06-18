<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSiteRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'max:50', 'min:2', Rule::unique('sites')->ignore(request('id'))],
            'url' => ['nullable', 'url'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => '站点名称',
            'keyword' => '网站关键字',
            'description' => '站点描述'
        ];
    }
}
