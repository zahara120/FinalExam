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

Auth::routes();

Route::get('/', 'HomeController@home')->name('home');
Route::get('/fullStory/{id}', 'HomeController@fullStory')->name('fullStory');
Route::get('/categorize/{id}', 'HomeController@category');

Route::group(['prefix' => 'userMenu'], function(){

    Route::get('/', 'HomeController@showUser')->name('showUser');
    Route::delete('{id}/delete', 'HomeController@deleteUser');
});

Route::group(['prefix' => 'profileMenu'], function(){

    Route::get('edit/{id}', 'HomeController@profile');
    Route::put('update/{id}', 'HomeController@updateProfile');
});

Route::group(['prefix' => 'blog'], function(){
    Route::get('/', 'HomeController@blogList')->name('blogList');
    
    Route::group(['prefix' => '{id}'], function(){
        Route::delete('delete', 'BlogController@destroy');
        Route::get('edit', 'BlogController@edit');
        Route::put('update', 'BlogController@update');
    });
});

Route::group(['prefix' => 'createBlog'], function(){
    Route::get('/', 'BlogController@create')->name('createBlog');
    Route::post('/store', 'BlogController@store')->name('createBlog');
});





