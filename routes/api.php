<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'API', 'prefix' => 'v2', 'middleware' => 'cors'], function() {
		// Route::post('login', 'AuthController@login');
    // Route::get('/', function () {
    //     $asd = ["1,1,1" => 1, "asd" => 2];
    //     return response($asd, 200)
    //         ->header('Content-Type', 'text/plain');
    // });

    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');

    Route::group(['middleware' => 'auth:api'], function(){
    	Route::post('details', 'UserController@details');
    });
    Route::resource('posts', 'PostAPIController');

});

// Route::post('login', 'API\UserController@login');
// Route::post('register', 'API\UserController@register');
//
// Route::group(['middleware' => 'auth:api'], function(){
// 	Route::post('details', 'API\UserController@details');
// });
