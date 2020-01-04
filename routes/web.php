<?php

use App\Mail\ContactMessageCreated;

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

Route::get('/', 'PagesStaticController@home')->name('root_path');

Route::get('/page1', 'PagesStaticController@page1')->name('page1_path');
Route::get('/page2', 'PagesStaticController@page2')->name('page2_path');

Route::get('/about', 'PagesStaticController@about')->name('about_path');

Route::get('/contact', 'ContactController@create')->name('contact_path');

Route::post('/contact', 'ContactController@store')->name('contact_path');

Auth::routes(['verify'=>'true']);

// Route::get('/home', 'HomeController@index')->name('home');
Route::post('/comment','CommentController@store');
Route::get('/comment/{url}','CommentController@index');