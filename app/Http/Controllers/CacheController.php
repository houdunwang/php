<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function syncSiteData(Site $site)
    {
        app('module')->syncModule();

        app('permission')->syncAllModulePermissions($site);

        return $this->success('同步数据成功');
    }
}
