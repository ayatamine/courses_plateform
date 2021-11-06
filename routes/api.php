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
    /* the auth section */
    Route::group(['namespace'=>'Api\Auth','prefix'=>'students'],function(){
        Route::post('login', 'UserController@login');
        Route::post('register','UserController@register');
        Route::get('details','UserController@details');
        Route::post('logout','UserController@logout');
        Route::post('refresh-token', 'UserController@refreshTo')->name('refreshToken');
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
        Route::post('logout','AdminController@logout');
        Route::post('refresh-token', 'AdminController@refreshTo')->name('refreshToken');
    });
    /**
    * courses api
    **/


    Route::group(['namespace'=>'Api\FrontEnd'],function(){
        Route::get('/pages/{slug}','PagesController');
        Route::get('/courses','CourseController@index');
        Route::get('/courses/{slug}','CourseController@show');
        Route::group(['prefix'=>'courses'],function(){
            Route::get('{course}/reviews','ReviewController@index');
        });
        Route::get('/categories','CategoryController@index');
        Route::get('/categories/{slug}/courses','CategoryController@courses');
        Route::get('/categories/{slug}/tutorials','CategoryController@tutorials');
        Route::get('/categories/{slug}/questions','CategoryController@questions');


        Route::get('/site_settings','HomeController@settings');
        Route::get('/posts','PostController@index');
        Route::get('/posts/{slug}','PostController@show');
        Route::get('/posts/{slug}/related','PostController@relatedPosts');
        Route::group(['prefix'=>'posts'],function(){
            Route::get('{slug}/comments','CommentController@postComments');
            Route::post('{slug}/comments/new','CommentController@store');
        });
        Route::get('/tags','TagController@index');
        Route::get('/tags/{id}/posts','TagController@posts');
        Route::get('/tags/{id}/courses','TagController@courses');
        Route::get('/tags/{id}/tutorials','TagController@tutorials');
        Route::get('/faqs','HomeController@faqs');
        Route::get('/achivements','HomeController@achivements');
        Route::post('/subscribe_to_newslist','NewsLetterController');

        /** tutorials */
        Route::get('/tutorials','TutorialController@index');
        Route::get('/tutorials/{slug}','TutorialController@show');

        Route::post('contact_us','HomeController@contact');
        Route::get('/site_settings','SettingController');
    });


    /*
    ** the admin area
    */
//    Route::group(['namespace'=>'Api\Admin','prefix'=>'admin-cpx','middleware' => ['auth:admin-api']],function(){
    Route::group(['namespace'=>'Api\Admin','prefix'=>'admin-cpx'],function(){
        Route::apiResource('/pages','PageController');
        Route::get('/site_settings','SettingController@index');
        Route::post('/update_site_settings','SettingController@update');
        Route::apiResource('/courses','CourseController');
        Route::post('/courses/{slug}','CourseController@update');
        Route::apiResource('/tutorials','TutorialController');
        Route::post('/tutorials/{slug}','TutorialController@update');
        Route::apiResource('/posts','PostController');
        Route::post('/posts/{slug}','PostController@update');
        Route::apiResource('/tags','TagController');
        Route::apiResource('/categories','CategoryController');
        Route::apiResource('/skills','SkillController');
        Route::apiResource('/faqs','FaqController');
    });

});
