<?php

namespace App\Http\Middleware;

use App\Models\Config;
use App\Models\System;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

/**
 * 系统中间件
 * @package App\Http\Middleware
 */
class SystemMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->loadConfig();
        return $next($request);
    }

    protected function loadConfig()
    {
        $config = System::value('config');
        foreach (config('system') as $name => $value) {
            foreach ($value as $key => $item) {
                $config[$name][$key] = $config[$name][$key] ?? $item;
            }
        }
        $config['site']['logo'] = $config['site']['logo'] ?? url('static/logo.png');

        config(['system' => $config]);
    }
}
