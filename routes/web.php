<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	//$api->middleware('jwt.refresh')->post('auth/refresh', 'App\Api\V1\Controllers\AuthController@refresh');
	
	$api->group(['prefix' => 'auth','namespace'=>'App\Api\V1\Controllers'], function($api)
	{
	    $api->post('logout', 'AuthController@logout');
	    $api->get('me', 'AuthController@me');
	});

});

$api->version('v2', function ($api) {
    $api->get('users/{id}', 'App\Api\V2\Controllers\UserController@show');
});

