<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
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
    Route::post('/subscribe_to_newslist','NewsLetterController@subscribe');
    Route::post('/unsubscribe_from_newslist','NewsLetterController@unsubscribe');

    // /** tutorials */
    // Route::get('/tutorials','TutorialController@index');
    // Route::get('/tutorials/{slug}','TutorialController@show');

    Route::post('contact_us','HomeController@contact');


// inertia routes 
Route::get('/','HomeController@index')->name('home');