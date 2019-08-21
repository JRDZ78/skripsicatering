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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//  });

Route::group(['prefix' => 'auth'], function ()
{

	Route::post('login', 'Api\UserApiController@login')->name('login');
    Route::post('register', 'Api\UserApiController@register');
    Route::post('editProfile', 'Api\UserApiController@editProfile');
    Route::post('changePassword', 'Api\UserApiController@changePassword');

    Route::get('cater','Api\AppApiController@catering_service');
    Route::post('menulist','Api\AppApiController@menu');
    Route::post('menudetail','Api\AppApiController@menuDetail');

    Route::post('storeCart','Api\CartApiController@storeCart');
    Route::post('deleteCart','Api\CartApiController@deleteCart');
    Route::post('checkOut', 'Api\TransactionApiController@checkOut');



    Route::group(['middleware' => 'auth:api'], function()
    {
        Route::get('logout', 'Api\UserApiController@logout');
        Route::get('user', 'Api\UserApiController@user');
        Route::post('cartlist','Api\CartApiController@getCart');
        Route::post('orderlist','Api\TransactionApiController@getOrders');

    });
});
