<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConfigRequest;
use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 更新系统配置
     *
     * @param UpdateConfigRequest $request
     * @param string $module
     */
    public function update(UpdateConfigRequest $request, string $module)
    {
        $config = Config::where('module', $module)->firstOrFail();
        $config['data'] = $request->input();
        $config->save();

        return $this->success(data: $config['data']);
    }

    /**
     * 获取配置
     *
     * @param Request $request
     * @param string $module
     */
    public function get(Request $request, string $module)
    {
        return $this->success(data: config($module));
    }
}
