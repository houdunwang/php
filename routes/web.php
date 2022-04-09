<?php

use App\Models\Config;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::fallback(function () {
    return include public_path('dist/index.html');
});
