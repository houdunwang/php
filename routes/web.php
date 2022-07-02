<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    $order = [
        'out_trade_no' => time(),
        'total_amount' => '1',
        'subject' => 'test subject - 测试',
    ];

    return app('alipay')->web([
        "app_secret_cert" => env('ALIPAY_APP_SECRET_CERT')
    ], [
        'out_trade_no' => '' . time(),
        'total_amount' => '0.01',
        'subject' => 'yansongda 测试 - 1',
    ], $order);
});

Route::fallback(function () {
    if (is_file(public_path('dist/index.html'))) {
        return file_get_contents(public_path('dist/index.html'));
    }
    return <<<str
        <h1 style="text-align:left;padding: 50px;font-weight:normal;font-size:35px;color:#333;">
            <div style="font-size:200px;">:(</div> 前端编译文件未生成
        </h1>
str;
});
