<?php
return [
    //阿里云
    "aliyun" => [
        'accessKeyId' => env('ALIYUN_ACCESS_KEY_ID'),
        'accessKeySecret' => env('ALIYUN_ACCESS_KEY_SECRET'),
        'smsSignName' => env('ALIYUN_SMS_SIGN_NAME', '身份验证')
    ],
    //验证码缓存时间
    "code_expire_time" => env('CODE_EXPIRE_TIME', 600),
];
