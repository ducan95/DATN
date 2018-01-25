<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WebService\Service\Category\CategoryService;
use WebService\Service\Post\PostService;
use WebService\Service\Release\ReleaseService;

class EndUserController extends Controller
{

  public function categoryInstance(){
    return CategoryService::getInstance();
  }

  public function index(){
  	return view('client.index');
  }

  public function myPage(){
    return view('client.myPage');
  }
  //
  public function cat($id){
    $arPosts = CategoryService::getInstance()->cat($id);
    $cat     = CategoryService::getInstance()->find($id);
    $row_count = 4;
    $result = CategoryService::getInstance()->loadmoreCat(0, $row_count, $id);
    $arPostsLoad = (!isset($result['errors'])) ?  $result['data'] : '';
    return view('client.category.index', compact('arPosts','id','cat','arPostsLoad'));
  }

  //loadmore Post of category
  public function loadmore(Request $request){
    $current_page = $request->current_page;
    $id = $request->id;
    $result = CategoryService::getInstance()->cat($id);
    $arPosts = $result['data'];
    $totalRecord = count($arPosts);
    $row_count = 4;
    $totalPage = ceil($totalRecord/$row_count);
    $current_page += 1;
    $offset = ($current_page - 1) * $row_count;
    $result = CategoryService::getInstance()->loadmoreCat($offset, $row_count, $id);
    $arPostsLoad = (!isset($result['errors'])) ?  $result['data'] : '';
    return view('client.category.loadmoreCat', compact('current_page','arPostsLoad','totalPage','id'));
  }

  public function detail($slug, $id = 0){
    $result = PostService::getInstance()->listOne($id);
    $oItem = (!isset($result['errors'])) ? $result['data'] : '';
    $id_post =  $oItem->id_post;
    $res1 = PostService::getInstance()->takeCatFirst($id_post);
    $arCatFirst = (!isset($result['errors'])) ? $res1['data'] : '';
    $id_cat =0;
    foreach ($arCatFirst as $value) {
      $id_cat = $value->id_category;
      break;
    }
    $res2 = CategoryService::getInstance()->loadmoreCat(0, 4, $id_cat);
    $arFourPostsOfCat = (!isset($res2['errors'])) ?  $res2['data'] : '';
    return view('client.detail', compact('oItem','id_cat','arFourPostsOfCat'));
  }

  public function release(){
    $res = ReleaseService::getInstance()->list();
    $oItems = (!isset($res['errors'])) ? $res['data'] : '';
    $row_count = 6;
    $res1 = ReleaseService::getInstance()->loadmoreRelease(0, $row_count);
    $oItemsLoad = (!isset($res1['errors'])) ? $res1['data'] : '';
    return view('client.release.index',compact('oItems','oItemsLoad'));
  }

  public function loadmoreRelease(Request $request){
    $current_page = $request->current_page;
    $res = ReleaseService::getInstance()->list();
    $oItems = (!isset($res['errors'])) ? $res['data'] : '';
    $totalRecord = count($oItems);
    $row_count = 6;
    $totalPage = ceil($totalRecord/$row_count);
    $current_page += 1;
    $offset = ($current_page - 1) * $row_count;
    $res1 = ReleaseService::getInstance()->loadmoreRelease($offset, $row_count);
    $oItemsLoad = (!isset($res1['errors'])) ? $res1['data'] : '';
    return view('client.release.loadmoreRelease',compact('current_page','oItemsLoad','totalPage'));
  }

}
