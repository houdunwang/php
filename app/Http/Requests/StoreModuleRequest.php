<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return is_super_admin();
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'name' => ['required'],
            'author' => ['required'],
        ];
    }

    public function attributes()
    {
        return ['title' => '模块名称', 'name' => '模块标识', 'author' => '模块作者'];
    }
}
