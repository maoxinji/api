<?php

namespace  App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Exception;

class AuthController  extends Controller
{
    
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }

    public function login(Request $request)
    {
        if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
            return $this->returnData(-1,'不存在的用户');
        }

        return $this->respondWithToken($token);
    }

    public function me(Request $request){
        \Log::info(111);
        return $this->returnData(0,'ok',[],0,$this->jwt->user());
    }

    protected function respondWithToken($token)
    {

        return $this->returnData(0,'ok',[],0,[
            'access_token' => 'bearer '.$token,
            'token_type' => 'bearer',
            'expires_in' => $this->jwt->factory()->getTTL() * 60
        ]);
    }
}
