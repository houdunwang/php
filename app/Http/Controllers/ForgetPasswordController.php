<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function __invoke(ForgetPasswordRequest $request)
    {
        $user = User::where('email', $request->account)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => '重设密码成功']);
    }
}
