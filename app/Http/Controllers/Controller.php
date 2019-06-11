<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

    public function returnData($code=0,$msg='ok',$list=[],$count=0,$result=null){

    	$result = $result ?? new \StdClass;

    	return compact('code','msg','list','count','result');	

    }
}
