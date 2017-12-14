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
//Kiểu này thì vào bình th tuy nhiên k xài đc bên midđleware

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
   /*  Route::get('admincp', function() {
        return view('admin.index');
    }); */
    Route::get('admincp', [
        'as' => 'getIndex', 
        'uses' => 'HomeController@index'
    ]);
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

