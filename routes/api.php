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

Route::get('/roles', 'RolesController@getRoles');
Route::get('/permission', 'PermissionController@getPermissions');
Route::get('/permissions', 'PermissionController@index');

/*
    |--------------------------------------------------------------------------
    | Authentication routes
    |--------------------------------------------------------------------------


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login')->name("auth.login");
    Route::post('logout', 'AuthController@logout')->name("auth.logout");
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});*/

Route::apiResources([
        'user' => 'UserController',
        'role' => 'RolesController',
        'permissions' => 'PermissionController',
       
    ]);