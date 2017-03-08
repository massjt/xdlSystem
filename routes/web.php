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


Route::get('/login',[
    'uses' => 'IndexController@getLogin',
    'as' => 'get.login'
]);
Route::post('/login',[
    'uses' => 'IndexController@postLogin',
    'as' => 'post.login'
]);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('Index');
    });
    Route::get('/xdl',function() {
        return view('Index');
    });
    Route::get('/logout',[
        'uses' => 'IndexController@getLogout',
        'as' => 'get.logout'
    ]);
});
