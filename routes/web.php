<?php

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $site = Site::where('url', $request->fullUrl())->firstOrFail();
    $moduleHtml = public_path("addons/{$site->module->name}/dist/index.html");

    return file_get_contents(is_file($moduleHtml) ? $moduleHtml : public_path('core/index.html'));
});

Route::fallback(function ($path = 'core') {
    $pathinfo = explode('/', $path);
    $dirname = $pathinfo[0] == 'core' ? 'core' : "addons/$pathinfo[0]/dist";

    return file_get_contents(public_path($dirname . '/index.html'));
});
