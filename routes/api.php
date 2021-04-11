<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['json.response']], function () {
    Route::apiResource('/courses','Api\CourseController');

    Route::group(['namespace'=>'Api\Auth','prefix'=>'students'],function(){
        Route::post('login', 'UserController@login');
        Route::post('register','UserController@register');
        Route::get('details','UserController@details');
        Route::get('logout','UserController@logout');
    });
    Route::group(['namespace'=>'Api\Auth','prefix'=>'instructors'],function(){
        Route::post('login', 'InstructorController@login');
        Route::post('register','InstructorController@register');
        Route::get('details','InstructorController@details');
        Route::get('logout','InstructorController@logout');
    });
    Route::group(['namespace'=>'Api\Auth','prefix'=>'admin-cpx'],function(){
        Route::post('login', 'AdminController@login');
        Route::post('register','AdminController@register');
        Route::get('details','AdminController@details');
        Route::get('logout','AdminController@logout');
    });
    Route::group(['namespace'=>'Api','prefix'=>'courses'],function(){
            Route::get('{course}/reviews','ReviewController@index');
});


});