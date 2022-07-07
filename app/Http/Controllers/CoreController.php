<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class CoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //更新站点数据
    public function update()
    {
        //同步本地模块到数据表
        app('module')->syncLocalAllModule();
        //更新所有站点权限
        app('permission')->syncAllSitePermissions();
        return $this->success('所有站点初始数据更新成功');
    }
}
