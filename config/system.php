<?php
return [
    "base" => [
        'mobile' => env('MOBILE')
    ],
    //基本信息
    "site" => [
        "title" => "后盾人",
        "logo" => null,
        "copyright" => "后盾人"
    ],
    //验证码
    'code' => [
        'expire' => env('CODE_EXPIRE_TIME', 600),
        'timeout' => env('CODE_TIMEOUT_TIME', 60),
        'length' => env('CODE_LENGTH', 4),
    ],
    //阿里云
    'aliyun' => [
        'access_key_id' => env('ALIYUN_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'sms_sign_name' => env('ALIYUN_SMS_SING_NAME')
    ],
    "avatar" => [
        //用户头像尺寸
        'width' => env('AVATAR_CROP_WIDTH', 500),
        'height' => env('AVATAR_CROP_HEIGHT', 100),
    ],
    //文件上传
    "upload" => [
        "size" => 2000,
        "mimes" => "doc,pdf"
    ]
];
