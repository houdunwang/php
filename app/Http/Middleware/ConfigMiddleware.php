<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;

class ConfigMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $config = Config::where('module', 'system')->first();

        config(['system.logo' => url('images/logo.png')]);

        collect($config['data'])->each(function ($item, $key) {
            config(['system.' . $key => $item]);
        });

        return $next($request);
    }
}
