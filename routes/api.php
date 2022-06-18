<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\FansController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SiteModuleController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);
Route::post('account/forget-password', ForgetPasswordController::class);

Route::post('code/send', [CodeController::class, 'send']);
Route::post('code/not_exist_user', [CodeController::class, 'notExistUser']);
Route::post('code/exist_user', [CodeController::class, 'existUser']);
Route::post('code/current_user/{type}', [CodeController::class, 'currentUser']);

Route::put('system', [SystemController::class, 'update']);
Route::get('system', [SystemController::class, 'get']);

Route::post('upload/avatar', [UploadController::class, 'avatar']);
Route::post('upload/image', [UploadController::class, 'image']);

Route::apiResource('site.permission', PermissionController::class)->only(['index']);
Route::get('site/{site}/update_site_permission', [PermissionController::class, 'updateSitePermissions']);

Route::apiResource('site.role', RoleController::class);
Route::post('site/{site}/role/{role}/permission', [RoleController::class, 'permission']);

Route::post('user/{user}/role/{role}', [UserController::class, 'role']);
Route::get('user/currentUser', [UserController::class, 'currentUser']);
Route::apiResource('user', UserController::class)->except(['store']);

Route::get('follower/{user}', [FollowerController::class, 'index']);
Route::get('follower/toggle/{user}', [FollowerController::class, 'toggle']);
Route::get('fans/{user}', [FansController::class, 'index']);

Route::apiResource('site', SiteController::class);
Route::apiResource('site.admin', AdminController::class);
Route::post('site/{site}/admin/{admin}/sync_admin_role', [AdminController::class, 'syncAdminRole']);

Route::apiResource('module', ModuleController::class);
Route::get('module/sync/module', [ModuleController::class, 'syncLocalModule']);

Route::apiResource("site.module", SiteModuleController::class);
Route::get("set_default_module/site/{site}/module/{module}", [SiteModuleController::class, 'setDefaultModule']);
