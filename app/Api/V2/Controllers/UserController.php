<?php

namespace App\Api\V2\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function show(){
        return [
            'version' => 'v1'
        ];
    }
}
