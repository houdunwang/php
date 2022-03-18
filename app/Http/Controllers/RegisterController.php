<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, UserService $user)
    {
        $user = User::create([
            $user->fieldName() => $request->account,
            'password' => Hash::make($request->password),
        ]);
        return ['user' => $user, 'token' => $user->createToken('auth')->plainTextToken];
    }
}
