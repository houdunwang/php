<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidateCodeController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [ValidateCodeController::class, 'send']);
Route::post('code/user/{type}', [ValidateCodeController::class, 'user']);

Route::put('config/{module}', [ConfigController::class, 'update']);

Route::post('upload/avatar', [UploadController::class, 'avatar']);

Route::apiResource('permission', PermissionController::class);
Route::apiResource('role', RoleController::class);
Route::post('role/{role}/permission', [RoleController::class, 'permission']);

Route::post('user/{user}/role/{role}', [UserController::class, 'role']);
Route::get('user/follower/{user}', [UserController::class, 'follower']);
Route::get('user/fans/{user}', [UserController::class, 'fans']);
