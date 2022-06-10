<?php

namespace App\Http\Middleware;

use App\Models\Site;
use Closure;
use Illuminate\Http\Request;

class SiteMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $site = request('site');

        if (is_numeric($site)) $site = Site::findOrFail($site);
        if ($site instanceof Site) $this->loadConfig($site);

        return $next($request);
    }

    protected function loadConfig(Site $site)
    {
        foreach (config('site') as $name => $value) {
            foreach ($value as $key => $item) {
                config(["site.{$name}.{$key}" => $site['config'][$name][$key] ?? $item]);
            }
        }
    }
}
