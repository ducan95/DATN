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

Route::get('/', [
    'as' => 'getLogin', 
    'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('/', [
    'as' => 'postLogin', 
    'uses' => 'Auth\AuthController@postLogin'
]);
Route::get('logout', [
    'as' => 'getLogout', 
    'uses' => 'Auth\AuthController@getLogout'
]);

Route::group([ 'middleware' => 'checkAdminLogin' ], function() {
    Route::get('admincp', [
        'as' => 'getIndex', 
        'uses' => 'HomeController@index'
    ]);
});

// Admin users route
Route::group([ 
    'middleware' => 'checkAdminLogin',
    'prefix'     => 'admincp'
], function() {
    Route::get('users', function() {
        return view('templates.admin.users.index');
    });
    Route::get('users/add', function() {
        return view('templates.admin.users.add');
    });
     Route::get('users/edit', function() {
        return view('templates.admin.users.edit');
    });
});

// API
Route::group(['namespace' =>'Api'],function(){
  Route::get('/web_api/release_number',[
    'uses' => 'ReleaseNumberController@actionList',
    'as'   => 'getReleaseAPI'
  ]);
  Route::get('/web_api/category',[
    'uses' => 'CategoryController@actionList',
    'as' => 'getCategory',
  ]);
  Route::get('category',[
    'uses'  =>'CategoryController@index',
    'as'    =>'category.index'
  ]);
});

