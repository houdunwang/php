<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return include public_path('dist/index.html');
});
