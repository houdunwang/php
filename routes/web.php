<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return captcha_src();
});

Route::fallback(function () {
    return include public_path('dist/index.html');
});
