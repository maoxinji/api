<?php

namespace  App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Hashing\Hasher;
use Auth;

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

    public function show(Hasher $hasher){

        dd(1);

        /*$a = Auth::user();

        dd($a);     */   
    }
}
