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

/**
 * WEB ROUTE
 */
Route::group([ 
    'middleware' => 'checkAdminLogin',
    'prefix'     => config('admin.prefix.web'),
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

    Route::group([ 'prefix' => 'category' ],function(){

        Route::get('/',[
            'uses' => 'CategoryController@viewIndex',
            'as' =>'webCategoryIndex'
        ]);

        Route::get('/add',[
            'uses' => 'CategoryController@viewAdd',
            'as' =>'webCategoryAdd'
        ]);

        Route::get('/addchildren',[
            'uses' => 'CategoryController@viewAddChildren',
            'as' =>'webCategoryAddChildren'
        ]);


        Route::get('/edit',[
            'uses' => 'CategoryController@viewEdit',
            'as' =>'webCategorEdit'
        ]);
    });
});
/**
 * Sougou Zyanaru Group API
 * Author: Rikkei Intern Pro Team
 */
Route::group([
  'namespace' =>'Api', 
  'prefix' => config('admin.prefix.api')],
function(){

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

    Route::post('/find', [
        'uses' => 'UserController@actionFind',
        'as' => 'apiUserFind'
    ]);

    Route::get('/{id}', [
        'uses' => 'UserController@actionFindOne',
        'as' => 'apiUserShow'
    ]);
    Route::post('/', [
        'uses' => 'UserController@actionSave',
        'as' => 'apiUserSave'
    ]);

    Route::put('/{id}', [
        'uses' => 'UserController@actionUpdate',
        'as' => 'apiUserUpdate'
    ]);
    Route::delete('/dele/{id}', [
        'uses' => 'UserController@actionDelete',
        'as' => 'apiUserDelete'
    ]);
  });


    Route::group(['prefix' => '/category'], function(){
        // Get list users
        Route::get('/list', [
            'uses' => 'CategoryController@actionList',
            'as' => 'apiCategoryList'
        ]);
        // Get user
        Route::get('/find/{id_category}', [
            'uses' => 'CategoryController@actionFindOne',
            'as' => 'apiCategoryShow'
        ]);
        Route::post('/add', [
            'uses' => 'CategoryController@actionSave',
            'as' => 'apiCategorySave'
        ]);
        Route::put('/{id}', [
            'uses' => 'CategoryController@actionUpdate',
            'as' => 'apiCategoryUpdate'
        ]);
        Route::delete('/{id}', [
            'user' => 'CategoryController@actionDelete',
            'as' => 'apiCategoryDelete'
        ]);
    });
  Route::group(['prefix' => '/image'],function(){
    // Get list users
    Route::get('/find', [
        'uses' => 'ImageController@actionFind',
        'as' => 'apiImageFind'
    ]);
    // Get user
    Route::get('/{id}', [
        'uses' => 'ImageController@actionFindOne',
        'as' => 'apiImageShow'
    ]);
    Route::post('/', [
      'uses' => 'ImageController@actionSave',
      'as' => 'apiImageSave'
    ]);

    Route::post('/{id}', [
        'uses' => 'ImageController@actionUpdate',
        'as' => 'apiImageUpdate'
    ]);
    Route::delete('/dele/{id}', [
        'uses' => 'ImageController@actionDelete',
        'as' => 'apiImageDelete'
    ]);
  });

});




