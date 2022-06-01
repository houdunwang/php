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
            'site.logo' => ['required', 'url'],
            'avatar.width' => ['required', 'numeric'],
            'avatar.height' => ['required', 'numeric'],
            'upload.size' => ['required', 'numeric'],
            'upload.mimes' => ['required'],
            'code.expire' => ['required', 'numeric'],
            'code.length' => ['required', 'numeric'],
            'code.timeout' => ['required', 'numeric'],
        ];
    }

    public function attributes()
    {
        return [
            'site.title' => '站点名称', 'site.logo' => '网站标志',
            'avatar.width' => '头像宽度',
            'avatar.height' => '头像高度',
            'upload.size' => '上传文件大小',
            'upload.mimes' => '文件类型',
            'code.expire' => '验证码有效期',
            'code.length' => '验证码数量',
            'code.timeout' => '验证码超时时间',
        ];
    }
}
