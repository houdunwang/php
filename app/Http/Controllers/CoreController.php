<?php

namespace App\Http\Controllers;

class CoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    //更新站点数据
    public function update()
    {
        app('module')->syncLocalAllModule();
        app('permission')->syncAllSitePermissions();

        return $this->success('所有站点初始数据更新成功');
    }
}
