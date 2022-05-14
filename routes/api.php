<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FansController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [CodeController::class, 'send']);
Route::post('code/not_exist_user', [CodeController::class, 'notExistUser']);
Route::post('code/exist_user', [CodeController::class, 'existUser']);
Route::post('code/user/{type}', [CodeController::class, 'user']);

Route::put('config/{module}', [ConfigController::class, 'update']);
Route::get('config/{module}', [ConfigController::class, 'get']);

Route::post('upload/avatar', [UploadController::class, 'avatar']);

Route::apiResource('permission', PermissionController::class);
Route::apiResource('role', RoleController::class);
Route::post('role/{role}/permission', [RoleController::class, 'permission']);

Route::post('user/{user}/role/{role}', [UserController::class, 'role']);
Route::get('user/info', [UserController::class, 'info']);
Route::apiResource('user', UserController::class);

Route::get('follower/{user}', [FollowerController::class, 'index']);
Route::get('follower/toggle/{user}', [FollowerController::class, 'toggle']);
Route::get('fans/{user}', [FansController::class, 'index']);

Route::get('captcha', CaptchaController::class);

Route::apiResource('site', SiteController::class);
