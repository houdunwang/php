<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCodeRequest;
use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;
use App\Services\CodeService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ValidateCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['user']);
    }

    /**
     * 发送验证码
     * @param ValidateCodeRequest $request
     * @param CodeService $codeService
     * @return Response|ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws BindingResolutionException
     */
    public function send(ValidateCodeRequest $request, CodeService $codeService)
    {
        $code = $codeService->send($request->account);
        return response(['message' => '验证码发送成功', 'code' => $code]);
    }

    /**
     * 已经注册用户
     * @param string $type
     * @param CodeService $codeService
     * @return Response|ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws BindingResolutionException
     */
    public function user(string $type, CodeService $codeService)
    {
        $code = $codeService->send(Auth::user()[$type == 'email' ? 'email' : 'mobile']);
        return response(['message' => '验证码发送成功', 'code' => $code]);
    }
}
