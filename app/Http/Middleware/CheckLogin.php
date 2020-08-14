<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $_SERVER['uid'] = 0;        //默认未登录
        $token = Cookie::get('token');
        if($token)
        {
            $token = Crypt::decryptString($token);        //解密cookie
            $token_key = 'h:login_info:'.$token;
            $uid = Redis::hGet($token_key,'uid');

            if($uid)        // 登录有效
            {
                $_SERVER['uid'] = $uid;
            }
        }


        return $next($request);
    }
}
