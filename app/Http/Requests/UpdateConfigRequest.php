<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigRequest extends FormRequest
{
    public function authorize()
    {
        return is_super_admin();
    }

    public function rules()
    {
        return [
            'site.title' => ['required'],
            'site.logo' => ['required', 'url']
        ];
    }

    public function attributes()
    {
        return ['site.title' => '站点名称', 'site.logo' => '网站标志'];
    }
}
