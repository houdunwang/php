<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mews\Captcha\Captcha;
use Mews\Captcha\Facades\Captcha as FacadesCaptcha;

class CaptchaController extends Controller
{
    public function __invoke(Captcha $captcha, $config = 'default')
    {
        return captcha_img();
    }
}
