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
Route::pattern('id', '[0-9]+');
Route::pattern('search', '[A-Za-z]+');



/**
 * ROUTE LOGIN
 */  
Route::group([
  'prefix' => config('admin.prefix.web')
], function(){

  Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as' => 'getLogin',
  ]);

  Route::post('login', [   
    'uses' => 'Auth\AuthController@postLogin',
    'as' => 'postLogin'
  ]);

  Route::get('logout', [
      'as' => 'getLogout', 
      'uses' => 'Auth\AuthController@getLogout'
  ]);

});

/**
 * ROUTE ADMIN WEB
 */
Route::group([ 
  'middleware' => 'checkAdminLogin',
  'prefix'     => config('admin.prefix.web'),
  'namespace'  => 'Web'
], function() {
  /** home **/
  Route::get('/',[
    'uses' => 'HomeController@index',
    'as' => 'getIndex'
  ]);
  /** router web user **/
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
 * ROUTE ADMIN API
 */
Route::group([
  'namespace' =>'Api', 
  'prefix' => config('admin.prefix.api')
], function(){
  /** router role api **/
  Route::group(['prefix' => '/roles'], function(){
      /** Get List Roles **/
      Route::get('/', [
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
  /** router user api **/
  Route::group(['prefix' => '/user'], function(){

    Route::get('/{search?}', [
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
    Route::post('/{id}', [
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

    Route::get('/{search?}', [
      'uses' => 'ImageController@actionFind',
      'as' => 'apiImageFind'

    ]);

    Route::get('/{id}', [
        'uses' => 'ImageController@actionFindOne',
        'as' => 'apiImageShow'
    ]);

    Route::post('/', [
      'uses' => 'ImageController@actionSave',
      'as' => 'apiImageSave'
    ]);

    Route::put('/{id}', [
        'uses' => 'ImageController@actionUpdate',
        'as' => 'apiImageUpdate'
    ]);

    Route::delete('/{id}', [
        'uses' => 'ImageController@actionDelete',
        'as' => 'apiImageDelete'
    ]);
  });

});

    




