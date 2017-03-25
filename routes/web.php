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
    Route::get('/', 'QuestionController@getIndex');
    Route::get('/questions', [
        'uses' => 'QuestionController@getIndex',
        'as' => 'new.questions'
    ]);
    // hot
    Route::get('/questions/hot', [
        'uses' => 'QuestionController@getHot',
        'as' => 'hot.questions'
    ]);
    // single question
    Route::get('/q/{id}',[
        'uses' => 'QuestionController@getSingleQues',
        'as' => 'single.ques'
    ]);
    // ask question
    Route::get('/ask', [
        'uses' => 'AskController@getIndex',
        'as' => 'ask.question'
    ]);
    // post question
    Route::post('/ask', [
        'uses' => 'AskController@postIndex',
        'as' => 'post.question'
    ]);
    // user profile
    Route::get('/profile/{name}',[
        'uses' => 'ProfileController@getProfile',
        'as'   => 'user.profile'
    ]);
    // edit user profile
    Route::get('/profile/{name}/edit', [
        'uses' => 'ProfileController@editProfile',
        'as' => 'edit.profile'
    ]);
    // post user profile info
    Route::post('/profile', [
        'uses' => 'ProfileController@postProfile',
        'as' => 'post.profile'
    ]);
    Route::get('/logout',[
        'uses' => 'IndexController@getLogout',
        'as' => 'get.logout'
    ]);
});
