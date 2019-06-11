<?php

/*
 * This file is part of jwt-auth.
 *
 * (c) Sean Tymon <tymon148@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Authenticate extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @throws \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          try{
                //从请求中获取token并且验证token是否过期  若是不过期则请求到控制器处理业务逻辑  若是过期则进行刷新
                $this->authenticate($request);
                return $next($request);
          }catch (UnauthorizedHttpException $exception){
                try {
                    $token = $this->auth -> refresh();
                    return $this->setAuthenticationHeader($next($request), $token);
                } catch (\Exception $e) {
                    return ['code'=>401,'msg'=>'token已失效','list'=>[],'count'=>0,'result'=>new \StdClass];
                }
          }
    }
}
