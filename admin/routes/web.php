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
Route::pattern('name','(.*)');
Route::pattern('id', '[0-9]+');
Route::pattern('search', '[A-Za-z]+');

/**
 * ROUTE LOGIN
 */  
Route::group([
  'prefix' => config('admin.prefix.web'),
  'namespace' => 'WebAdmin\Auth'
], function(){

  Route::get('login', [
    'uses' => 'AuthController@getLogin',
    'as' => 'getLogin',
  ]);

  Route::post('login', [   
    'uses' => 'AuthController@postLogin',
    'as' => 'postLogin'
  ]);

  Route::get('logout', [
      'as' => 'getLogout', 
      'uses' => 'AuthController@getLogout'
  ]);
});

/**
 * ROUTE ADMIN WEB
 */
Route::group([ 
 'middleware' => 'checkAdminLogin',
   // 'middleware' => 'CheckUser',
  'prefix'     => config('admin.prefix.web'),
  'namespace'  => 'WebAdmin\src'
], function() {

  Route::get('/',[
    'uses' => 'AdminController@index',
    'as' => 'getIndex'
  ])->middleware('checkRole: admin|s_admin|user|editor');
   /** router web user **/
  Route::group([ 
  'prefix' => 'user',
  'middleware' =>'checkRole: admin|s_admin',
], function(){

    Route::get('/',[
        'uses' => 'UserController@viewIndex' ,
        'as'  => 'webUserIndex',
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



  Route::group(['prefix' => 'member','middleware' =>'checkRole: admin|s_admin' ], function(){
    Route::get('/',[
      'uses'  => 'MemberController@viewIndex',
      'as'    => 'webMemberIndex'
    ]);

    Route::get('/add',[
      'uses'  => 'MemberController@viewAdd',
      'as'    => 'webMemberAdd'
    ]);

    Route::get('/edit',[
      'uses'  => 'MemberController@viewEdit',
      'as'    => 'webMemberEdit'
    ]);
  });


  Route::group([ 'prefix' => 'category', 'middleware' =>'checkRole: admin|s_admin|editor' ],function(){

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

     Route::get('/editparent',[
        'uses' => 'CategoryController@viewEditParent',
        'as' =>'webCategoryEditParent'
    ]);

    Route::get('/edit',[
        'uses' => 'CategoryController@viewEdit',
        'as' =>'webCategorEdit'
    ]);
  });
   /** router web images **/
  Route::group([ 'prefix' => 'images','middleware' =>'checkRole: admin|s_admin|editor|user'], function(){
    
    Route::get('/', [
      'uses' => 'ImageController@viewIndex',
      'as' => 'webImageIndex'
    ]);

    Route::get('/add', [
      'uses' => 'ImageController@viewAdd',
      'as' => 'webImageAdd'
    ]);

    Route::get('/edit', [
      'uses' => 'ImageController@viewEdit',
      'as' => 'webImageEdit'
    ]);
  });  
  /** router web release **/
  Route::group([ 'prefix' => 'release','middleware' =>'checkRole: admin|s_admin|editor' ],function(){

      Route::get('/',[
          'uses' => 'ReleaseController@viewIndex' ,
          'as'  => 'webReleaseIndex'
      ]);

      Route::get('/edit',[
          'uses' => 'ReleaseController@viewEdit' ,
          'as'  => 'webReleaseEdit'
      ]);


      Route::get('/add',[
            'uses' => 'ReleaseController@viewAdd' ,
            'as'  => 'webReleaseAdd'
        ]);
  });
   /** router web post **/
  Route::group([ 'prefix' => 'post','middleware' =>'checkRole: admin|s_admin|editor|user' ],function(){

      Route::get('/',[
          'uses' => 'PostController@viewIndex' ,
          'as'  => 'webPostIndex'
      ]);

      Route::get('/edit',[
          'uses' => 'PostController@viewEdit' ,
          'as'  => 'webPostEdit'
      ]);


      Route::get('/add',[
            'uses' => 'PostController@viewAdd' ,
            'as'  => 'webPostAdd'
        ]);

  });

});
/**
 * ROUTE ADMIN API
 */
Route::group([
  'namespace' =>'Api\src', 
  'prefix' => config('admin.prefix.api')
], function(){
  /** router role api **/
  Route::group(['prefix' => '/roles'], function(){
    /** Get List Roles **/
    Route::get('/', [
        'uses' => 'RolesController@actionList',
        'as'   => 'apiListRole'
    ]);
     
    Route::get('/{search?}', [
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

    Route::get('/', [
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
    
    Route::delete('/{id}', [
        'uses' => 'UserController@actionDelete',
        'as' => 'apiUserDelete'
    ]);
  });  
  /**ROUTER MEMBER API**/
  Route::group(['prefix' => '/member'],function(){
    //display list member
		Route::get('/', [
			'uses'  => 'MemberController@actionFind',
			'as'    => 'apiMemberFind'
		]);

    //get trong phương thức
    Route::get('/{id}', [
      'uses'  => 'MemberController@actionFindOne',
      'as'    => 'apiUserShow'
    ]);

    //edit member
    Route::post('/',[
      'uses'  => 'MemberController@actionSave',
      'as'    => 'apiMemberSave',
    ]);

		Route::delete('/{id}',[
			'uses'  => 'MemberController@actionActive',
			'as'    => 'apiMemberActive'
		]);


		Route::put('/{id}',[
			'uses' => 'MemberController@actionUpdate',
			'as'   => 'apiMemberUpdate'
		]);
	});
  /** router category api **/
  Route::group(['prefix' => '/category'], function(){
        
    Route::get('/', [
        'uses' => 'CategoryController@actionList',
        'as' => 'apiCategoryList'
    ]);

    Route::get('/category',[
      'uses' => 'CategoryController@actionFind',
      'as'   => 'apiCategoryFind'
    ]);
    Route::get('/{id}',[
      'uses' => 'CategoryController@actionListOne',
        'as' => 'apiCategoryListOne'
    ]);
    
    Route::get('/categorychildren/{id}', [
        'uses' => 'CategoryController@actionFindOne',
        'as' => 'apiCategoryShow'
    ]);
    Route::post('/add', [
        'uses' => 'CategoryController@actionSave',
        'as' => 'apiCategorySave'
    ]);
    Route::post('/addchildren',[
        'uses' => 'CategoryController@actionSaveChil',
        'as'   => 'apiCategorySaveChil'
    ]);
    Route::put('/{id}', [
        'uses' => 'CategoryController@actionUpdate',
        'as' => 'apiCategoryUpdate'
    ]);
    Route::put('/categorychildren/{id}', [
        'uses' => 'CategoryController@actionUpdateChil',
        'as' => 'apiCategoryUpdateChil'
    ]);
    Route::delete('/{id}', [
        'uses' => 'CategoryController@actionDelete',
        'as' => 'apiCategoryDelete'
    ]);
  });
  /** router images api **/
  Route::group(['prefix' => '/images'],function(){

    Route::get('/', [
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
  /** router images release **/
  Route::group(['prefix' => '/release'],function(){
    Route::get('/', [
      'uses' => 'ReleaseController@actionFind',
      'as'   => 'apiReleaseFind'
    ]);
    Route::get('/{id}', [
        'uses' => 'ReleaseController@actionFindOne',
        'as'   => 'apiReleaseShow'
    ]);
    Route::post('/', [
      'uses' => 'ReleaseController@actionSave',
      'as'   => 'apiReleaseSave'
    ]);
    Route::put('/{id}', [
        'uses' => 'ReleaseController@actionUpdate',
        'as'   => 'apiReleaseUpdate'
    ]);
    Route::delete('/{id}', [
        'uses' => 'ReleaseController@actionDelete',
        'as'   => 'apiReleaseDelete'
    ]);
  });
  /** router images post **/
  Route::group(['prefix' => '/post'], function(){

    Route::get('/', [
        'uses' => 'PostController@actionFind',
        'as' => 'apiPostFind'
    ]);
    
    Route::get('/{id}', [
        'uses' => 'PostController@actionFindOne',
        'as' => 'apiPostShow'
    ]);
    Route::post('/', [
        'uses' => 'PostController@actionSave',
        'as' => 'apiPostSave'
    ]);

    Route::put('/{id}', [
        'uses' => 'PostController@actionUpdate',
        'as' => 'apiPostUpdate'
    ]);
    
    Route::delete('/{id}', [
        'uses' => 'PostController@actionDelete',
        'as' => 'apiPostDelete'
    ]);
  });
  // Route::group(['prefix' => '/postcategory'], function(){
  //   Route::post('/', [
  //       'uses' => 'PostcategoryController@actionSave',
  //       'as' => 'apiPostcategorySave'
  //   ]);
  // });    


});

/**
 * ROUTE END USER
 */ 
    
Route::group([
  'prefix'    => '', 
  'namespace' => 'WebClient'
],function(){
  Route::get('member',[
    'uses'  => 'MemberController@index',
    'as'    => 'webClientMemberIndex'
  ]);

  Route::post('/register',[
    'uses'  => 'MemberController@save',
    'as'    => 'webClientMemberSave'
  ]);

  Route::get('',[
    'uses'  => 'EndUserController@index',
    'as'    => 'WebClientEndUserIndex',
  ]);

  Route::get('category/{id}',[
    'uses'  => 'EndUserController@cat',
    'as'    => 'WebClientEndUserCat'
  ]);

  Route::post('loadmore',[
    'uses'  => 'EndUserController@loadmore',
    'as'    => 'WebClientEndUserLoadmore',
  ]);

  Route::get('/{name}-{id}.html',[
    'uses'  => 'EndUserController@detail',
    'as'    => 'WebClientEndUserDetail'
  ]);

  Route::get('release',[
    'uses'  => 'EndUserController@release',
    'as'    => 'WebClientEndUserRelease'
  ]);
  
  Route::post('loadmoreRelease',[
    'uses'  => 'EndUserController@loadmoreRelease',
    'as'    => 'WebClientEndUserLoadmoreRelease',
  ]);
  Route::post('loadmorePost',[
    'uses'  => 'EndUserController@loadmorePost',
    'as'    => 'WebClientEndUserLoadmorePost',
  ]);

  Route::get('release/{id}',[
    'uses' => 'ReleaseController@postOfRelease',
    'as'   => 'WebClientReleasePostOfRelease'
  ]);

  Route::post('loadmorePostOfRealease',[
    'uses'  => 'ReleaseController@loadmorePostOfRealease',
    'as'    => 'WebClientReleaseLoadmorePostOfRelease',
  ]);
  /* Release Client */
  /*Route::group(['prefix' => '/release', 'namespace' => 'src'],function(){
    Route::get('/', [
      'uses' => 'ClientReleaseController@index',
      'as'   => 'ClientReleaseIndex'
    ]);
  });*/
  Route::get('myPage',[
    'uses'  => 'EndUserController@myPage',
    'as'    => 'WebClientEndUserMyPage',
  ]);

  Route::get('changeEmail',[
    'uses'  => 'MemberController@changeEmail',
    'as'    => 'webClientMemberChangeEmail',
  ]);

  Route::post('changeEmail',[
    'uses'  => 'MemberController@confirmEmail',
    'as'    => 'webClientMemberComfirmEmail',
  ]);

  Route::post('acceptEmail-{id}',[
    'uses'  => 'MemberController@acceptChangeEmail',
    'as'    => 'webClientMemberAcceptChangeEmail',
  ]);

  /*Route::get('acceptEmail-{id}',[
    'uses'  => 'MemberController@getAcceptChangeEmail',
    'as'    => 'webClientMemberAcceptChangeEmail',
  ]);*/

  Route::get('changeEmailSuccess',[
    'uses'  => 'MemberController@changeEmailSuccess',
    'as'    => 'webClientMemberChangeEmailSuccess',
  ]);


  Route::get('changePassword-{id}',[
    'uses'  => 'MemberController@getChangePassword',
    'as'    => 'webClientMemberChangePassword',
  ]);

  Route::post('changePassword-{id}',[
    'uses'  => 'MemberController@postChangePassword',
    'as'    => 'webClientMemberChangePassword',
  ]);
});

/**
 * ROUTE LOGIN END USER
 */  
Route::group([
  'prefix'    => 'login-end-user',
  'namespace' => 'WebClient\Auth'
], function(){

  Route::get('login', [
    'uses'  => 'AuthController@getLogin',
    'as'    => 'getLoginEndUser',
  ]);

  Route::post('login', [   
    'uses'  => 'AuthController@postLogin',
    'as'    => 'postLoginEndUser'
  ]);

  Route::get('logout', [
    'as'    => 'getLogoutEndUser', 
    'uses'  => 'AuthController@getLogoutEndUser'
  ]);
});



