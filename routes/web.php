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
    Route::get('courses','CourseController@index')->name('courses');
    Route::get('/courses/{slug}','CourseController@show');
    Route::group(['prefix'=>'courses'],function(){
        Route::get('{course}/reviews','ReviewController@index');
    });

    Route::get('/categories/{slug}/courses','CategoryController@courses');
    Route::get('/categories/{slug}/tutorials','CategoryController@tutorials');
    Route::get('/categories/{slug}/questions','CategoryController@questions');


  
   
    Route::group(['prefix'=>'posts'],function(){
        Route::get('{slug}/comments','CommentController@postComments');
        Route::post('{slug}/comments/new','CommentController@store');
    });
    

    Route::get('/faqs','HomeController@faqs');
    Route::get('/achivements','HomeController@achivements')->name('home.achievements');
    Route::post('/subscribe_to_newslist','NewsLetterController@subscribe');
    Route::post('/unsubscribe_from_newslist','NewsLetterController@unsubscribe');

    /** tutorials */
    Route::get('/tutorials','TutorialController@index')->name('tutorials');
    Route::get('/tutorials/{slug}','TutorialController@show');

    Route::post('contact_us','HomeController@contact')->name('contact');


// inertia routes 
Route::get('/','HomeController@index')->name('home');
Route::get('/articles','PostController@articles')->name('home.articles');
Route::get('/blog','PostController@index')->name('blog');
Route::get('/blog/{slug}','PostController@show')->name('blog.show');
Route::get('/blog/search','PostController@search')->name('blog.search');
Route::get('/articles/{slug}/related','PostController@relatedArticles')->name('article.related');
// tags filter and requests
Route::get('/tags','TagController@index')->name('tags.list');
Route::get('/tags/{id}/articles','TagController@articles')->name('tag.articles');
Route::get('/tags/{id}/courses','TagController@courses')->name('tags.courses');
Route::get('/tags/{id}/tutorials','TagController@tutorials')->name('tags.tutorials');
// caegories filter and requests
Route::get('/categories','CategoryController@index');
Route::get('/categories/{category_slug}/articles','CategoryController@articles')->name('category.articles');







Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);

    return redirect()->back();
})->name('language');
