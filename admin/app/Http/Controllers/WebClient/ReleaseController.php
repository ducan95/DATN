<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WebService\Service\Release\ReleaseService;

class ReleaseController extends Controller
{

  public function postOfRelease($id){
    $res = ReleaseService::getInstance()->postOfRelease($id);
    $arPosts = (!isset($res['errors'])) ? $res['data'] : '';
    $res2 = ReleaseService::getInstance()->listOne($id);
    $release_number = (!isset($res2['errors'])) ? $res2['data'] : '';
    return view('client.release.postOfRelease',compact('arPosts','release_number','id'));
  }

  public function loadmorePostOfRealease(Request $request){
    $current_page = $request->current_page;
    $id = $request->id; //id_release_number
    $res = ReleaseService::getInstance()->postOfRelease($id);
    $arPosts = (!isset($res['errors'])) ? $res['data'] : '';
    $totalRecord = count($arPosts);
    $row_count = 4;
    $totalPage = ceil($totalRecord/$row_count);
    $current_page += 1;
    $offset = ($current_page - 1) * $row_count;
    $res1 = ReleaseService::getInstance()->loadmorePostOfRelease($offset, $row_count, $id);
    $arPostsLoad = (!isset($res1['errors'])) ?  $res1['data'] : '';
    return view('client.release.loadmorePostOfRealease',compact('current_page','arPostsLoad','totalPage','id'));
  }
}
