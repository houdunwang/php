<?php
return [
    // 系统令牌
    "site" => [
        "tel" => "后盾人",
        "email" => null,
        "address" => "后盾人"
    ],
    //阿里云
    'aliyun' => [
        'access_key_id' => env('ALIYUN_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'sms_sign_name' => env('ALIYUN_SMS_SING_NAME')
    ],
];
