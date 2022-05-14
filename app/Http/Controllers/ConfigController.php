<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Auth;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function update(Request $request, string $module)
    {
        $config = Config::where('module', $module)->firstOrFail();
        $config['data'] = $request->input();
        $config->save();

        return $this->success(data: $config['data']);
    }

    public function get(Request $request, string $module)
    {
        $config = ['data' => []];
        switch ($module) {
            case 'system':
                if (is_super_admin())
                    $config =  config("system");
            default:
                $config = Config::where('module', $module)->firstOrFail();
        }
        return $this->success(data: $config['data']);
    }
}
