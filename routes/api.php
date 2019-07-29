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


Route::group(['prefix' => 'v1'], function ()  {
    Route::post('token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->name('oauth.token');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::group(['middleware'=>'role:admin'],function (){
            Route::post('newuser', 'Api\v1\UserRegistrationController@create')->name('createuser');
            Route::delete('user/{id}', 'Api\v1\UserRegistrationController@delete')->name('deleteuser');
            Route::post('user/{id}/group', 'Api\v1\UserRegistrationController@addgroupuser')->name('addgroupuser');
            Route::delete('user/{id}/group', 'Api\v1\UserRegistrationController@deletegroupuser')->name('deletegroupuser');
            Route::post('group', 'Api\v1\UserRegistrationController@addgroup')->name('addgroup');
            Route::delete('group', 'Api\v1\UserRegistrationController@deletegroup')->name('deletegroup');
        });

    });
});
