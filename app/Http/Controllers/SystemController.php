<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['common']);
    }

    /**
     * 更新系统配置
     * @param UpdateSystemRequest $request
     */
    public function update(UpdateSystemRequest $request)
    {
        $config = System::firstOrFail();
        $config['config'] = $request->input('config');
        $config->save();

        return $this->success(data: $config['data']);
    }

    /**
     * 获取配置
     * @param Request $request
     * @param string $module
     */
    public function get(Request $request)
    {
        return $this->success(data: System::first());
    }

    /**
     * 获取公共配置
     * @param Request $request
     * @param string $module
     */
    public function common(Request $request)
    {
        $system = System::first()->toArray();
        unset($system['config']);
        return $this->success(data: $system);
    }
}
