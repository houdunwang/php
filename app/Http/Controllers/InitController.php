<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitController extends Controller
{
    public function __invoke()
    {
        return $this->success(data: [
            'config' => config('system.site')
        ]);
    }
}
