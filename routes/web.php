<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function ($path = 'core') {
    $pathinfo = explode('/', $path);
    $dirname = $pathinfo[0] == 'core' ? 'core' : "addons/$pathinfo[0]/dist";

    return file_get_contents(public_path($dirname . '/index.html'));
});
