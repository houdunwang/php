<?php

namespace App\Http\Middleware;

use App\Models\System;
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
        $this->config();
        return $next($request);
    }

    protected function config()
    {
        if (!public_path('index.html')) {
            $system = System::find(1);
            foreach (config('system') as $name => $value) {
                foreach ($value as $key => $item) {
                    config(["system.{$name}.{$key}" => $system['config'][$name][$key] ?? $item]);
                }
            }
        }
    }
}
