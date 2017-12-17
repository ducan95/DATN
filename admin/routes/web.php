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
    'prefix'     => 'admincp',
    'namespace'  => 'Web'
], function() {

    Route::group([ 'prefix' => 'user' ],function(){

        Route::get('/',[
            'uses' => 'UserController@viewIndex' ,
            'as'  => 'webUserIndex'
        ]);

        Route::get('/edit',[
            'uses' => 'UserController@viewEdit' ,
            'as'  => 'webUserEdit'
        ]);

        Route::get('/add',[
            'uses' => 'UserController@viewAdd' ,
            'as'  => 'webUserAdd'
        ]);

    });
    
});

// API

Route::group(['namespace' =>'Api', 'prefix' => '/web_api'],function(){
    Route::get('/web_api/release_number',[
        'uses' => 'ReleaseNumberController@actionList',
        'as'   => 'getReleaseNumber'
    ]);

    Route::group(['prefix' => '/roles'], function(){
        /** Get List Roles **/
        Route::post('/', [
            'uses' => 'RolesController@actionList',
            'as'   => 'apiListRole'
        ]);
        
        Route::get('/{id}', [
            'uses' => 'RolesController@actionFind',
            'as'   => 'apiFindRole'
        ]);
        
        Route::post('/', [
            'uses' => 'RolesController@actionSave',
            'as'   => 'apiSaveRole'
        ]);

        Route::put('/{id}/huynh', [
            'uses' => 'RolesController@actionUpdate',
            'as'   => 'postUpdateRole'
        ]);

        Route::delete('{id}',[
            'uses' => 'RolesController@actionDelete',
            'as'   => 'postDeleteRole'
        ]);
    });
    Route::group(['prefix' => '/user'], function(){

        Route::post('/', [
            'uses' => 'UserController@actionFind',
            'as' => 'apiUserList'
        ]);
        Route::get('/{id}', [
            'uses' => 'UserController@actionFindOne',
            'as' => 'apiUserShow'
        ]);
       /* Route::post('/', [
            'uses' => 'UserController@actionSave',
            'as' => 'apiUserSave'
        ]);*/
        Route::put('/{id}', [
            'uses' => 'UserController@actionUpdate',
            'as' => 'apiUserUpdate'
        ]);
        Route::delete('/dele/{id}', [
            'uses' => 'UserController@actionDelete',
            'as' => 'apiUserDelete'
        ]);
    });

});

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

