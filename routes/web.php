<?php

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

Route::get('/', function () {
     return view('welcome');
 });
Route::get('/total', 'PostController@total');

Route::get('/posts', 'PostController@index');

Route::resource('posts', 'PostController');

Route::post('/delete', 'PostController@del'); 

Route::post('/update', 'PostController@update');

if(env('APP_ENV') === 'local') {
    URL::forceScheme('https');
}