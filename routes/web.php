<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/f', function () {
//     return view('fullStory');
// });
Auth::routes();

Route::get('/', 'HomeController@home')->name('home');
Route::get('/fullStory/{id}', 'HomeController@fullStory')->name('fullStory');
Route::get('/userMenu', 'HomeController@showUser')->name('showUser');

//update profile
Route::get('/profileMenu/{id}/edit', 'HomeController@profile');
Route::post('/profileMenu/{id}/update', 'HomeController@updateProfile');

//category
Route::get('/categorize/{id}', 'HomeController@category');

Route::get('/blog', 'HomeController@blogList')->name('blogList');
Route::get('/createBlog', 'BlogController@create')->name('createBlog');

//insert blog
Route::post('/createBlog/store', 'BlogController@store')->name('createBlog');

//delete user
Route::get('/userMenu/{id}/delete', 'HomeController@deleteUser');

//delete blog
Route::get('/blog/{id}/delete', 'BlogController@destroy');

