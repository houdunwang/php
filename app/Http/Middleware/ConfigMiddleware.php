<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;

/**
 * 配置项中间件
 * @package App\Http\Middleware
 */
class ConfigMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->loadConfig('system', config('system'));

        return $next($request);
    }

    protected function loadConfig($module, $config)
    {
        $data = Config::where('module', $module)->first()['data'] ?? [];

        foreach ($config as $name => $value) {
            foreach ($value as $key => $item) {
                $config[$name][$key] = $data[$name][$key] ?? $item;
            }
        }

        config([$module => $config]);
    }
}
