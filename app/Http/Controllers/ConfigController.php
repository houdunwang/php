<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use App\Models\Config;
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

        return $config['data'];
    }
}
