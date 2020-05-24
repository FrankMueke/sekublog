<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['web']], function () {
Route::auth();

Route::get('/home', 'HomeController@index')->name('home');
//auth routes
// Route::get('login', ['as' => 'login', 'uses' =>'Auth\LoginController@showLoginForm']);
// Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// //Registration routes
// Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
// Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

//Passwords reset
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.update');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Categories
Route::resource('categories','CategoryController', ['except' => 'create']);

//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store' ]);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::patch('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
//Tags
Route::resource('tags','TagController', ['except' => 'create']);

//catpages
Route::get('business', 'CatPagesController@getBusiness');
Route::get('fashion', 'CatPagesController@getFashion');
Route::get('politics', 'CatPagesController@getPolitics');
Route::get('tech', 'CatPagesController@getTech');
Route::get('sports', 'CatPagesController@getSports');

   
    Route::get('blog/{slug}', ['as' =>'blog.single','uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
    Route::get('/', 'PagesController@getIndex');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', ['uses'=>'PagesController@getContact', 'as'=>'home']);
    Route::post('contact', 'PagesController@postContact');
    Route::resource('posts', 'PostController');  
});
