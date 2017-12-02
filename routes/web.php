<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('upload', 'UploadController@index');

Route::post('apply/upload', 'UploadController@upload');

Route::get('profile/{id}', 'UsersController@profile');

Route::get('image/{id}', 'UsersController@image' );

Route::get('delete/{id}' , 'UploadController@delete');

Route::get('search', ['as' => 'search', 'uses' => 'HomeController@search']);

Route::get('modal_content/{id}' , 'HomeController@modal_content');





