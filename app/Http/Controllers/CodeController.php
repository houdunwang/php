<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeRequest;
use App\Services\CodeService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CodeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->only(['user']);
    }

    /**
     * 发送验证码
     * @param CodeRequest $request
     * @param CodeService $codeService
     * @return Response|ResponseFactory
     * @throws HttpException
     * @throws NotFoundHttpException
     * @throws BindingResolutionException
     */
    public function send(CodeRequest $request, CodeService $codeService)
    {
        $code = $codeService->send($request->account);
        return $this->success('验证码发送成功', $code);
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
        return $this->success('验证码发送成功',  $code);
    }
}
