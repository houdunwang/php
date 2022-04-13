<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function __invoke(Request $request)
    {
        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        // Auth::user()->tokens()->delete();
        Auth::user()->currentAccessToken()->delete();
        return $this->success();
    }
}
