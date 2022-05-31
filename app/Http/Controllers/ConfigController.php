<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConfigRequest;
use App\Models\Config;
use Auth;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function update(UpdateConfigRequest $request, string $module)
    {
        $config = Config::where('module', $module)->firstOrFail();
        $config['data'] = $request->input();
        $config->save();

        return $this->success(data: $config['data']);
    }

    public function get(Request $request, string $module)
    {
        return $this->success(data: config($module));
    }
}
