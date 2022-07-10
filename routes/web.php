<?php

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $site = Site::where('url', $request->host())->first();

    if (!$site || !$site->module) return view('404', ['message' => '域名没有绑定站点，或站点没有设置默认模块']);

    $moduleHtml = public_path("addons/{$site->module->name}/dist/index.html");
    return file_get_contents(is_file($moduleHtml) ? $moduleHtml : public_path('core/index.html'));
});

Route::fallback(function ($path = 'core') {
    $pathinfo = explode('/', $path);
    $dirname = $pathinfo[0] == 'core' ? 'core' : "addons/$pathinfo[0]/dist";

    $template = public_path($dirname . '/index.html');
    if (!is_file($template)) return view('404');
    return file_get_contents($template);
});
