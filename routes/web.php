<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return include public_path('dist/index.html');
});

Route::get('test', function () {
    return User::first();
});
