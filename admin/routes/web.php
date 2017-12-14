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

Route::get('admincp', function () {
    return view('admin.index');
});

Route::group(['namespace' =>'Auth'],function(){
	Route::get('login',[
        'uses' => 'AuthController@getLogin',
        'as'   => 'getLogin'
    ]);
	Route::post('login',[
        'uses' => 'AuthController@postLogin',
        'as'   => 'postLogin'
    ]);
	Route::get('logout',[
        'uses' => 'AuthController@getgout',
        'as' => 'getLogout'
    ]);
});


Route::group(['namespace' =>'Api'],function(){
  Route::get('/web_api/release_number',[
    'uses' => 'ReleaseNumberController@actionList',
    'as'   => 'getLogin'
  ]);

});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// route to process the form
//Route::post('login', array('uses' => 'Auth\AuthController@showLogin'));

