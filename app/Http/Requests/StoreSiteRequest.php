<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSiteRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'max:20', 'min:2', 'unique:sites'],
            'url' => ['nullable', 'url'],
        ];
    }

    public function attributes()
    {
        return ['title' => '站点名称', 'keyword' => '网站关键字', 'description' => '站点描述'];
    }
}
