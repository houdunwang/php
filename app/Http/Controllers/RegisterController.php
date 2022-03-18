<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $fieldName = app('user')->accountFieldName($request->account);

        $user = User::create([
            $fieldName => $request->account,
            'password' => $request->password,
        ]);
        return ['user' => $user, 'token' => $user->createToken('auth')->plainTextToken];
    }
}
