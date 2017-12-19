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
    
});

Route::group([ 
    'middleware' => 'checkAdminLogin',
    'prefix'     => 'admincp',
], function() {
  Route::get('category', function() {
      return view('templates.admin.category.category');
  });

  Route::get('category/add', function() {
      return view('templates.admin.category.addcategory');
  });

   Route::get('category/addchildren', function() {
      return view('templates.admin.category.addcategorychildern');
  });

  Route::get('category/setdisplay',function(){
      return view('templates.admin.category.setdisplay');
   });

  Route::get('category/edit',function(){
      return view('templates.admin.category.editcategorychildren');
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
    Route::delete('/dele/{id}', [
        'uses' => 'UserController@actionDelete',
        'as' => 'apiUserDelete'
    ]);
  });
  /** router category api **/
  Route::group(['prefix' => '/category'], function(){
      // Get list users
      Route::get('/', [
          'uses' => 'CategoryController@actionList',
          'as' => 'apiCategoryList'
      ]);
      // Get user
      Route::get('/{id}', [
          'uses' => 'CategoryController@actionFind',
          'as' => 'apiCategoryShow'
      ]);
      Route::post('/', [
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
  /** router iamge api **/
  Route::group(['prefix' => '/images'],function(){
    
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




