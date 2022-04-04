<?php

namespace App\Http\Middleware;

use App\Models\Config;
use Closure;
use Illuminate\Http\Request;

class ConfigMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $config = Config::firstOrNew()->toArray();

        config(['system' => $config ? $config['data'] : config('system')]);

        return $next($request);
    }
}
