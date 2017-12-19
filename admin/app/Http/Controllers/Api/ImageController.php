<?php
namespace App\Http\Controllers\Api;
use WebService\Service\Image\ImageService;
use Illuminate\Http\Request;
use Extention\Media;
use Extention\Api;
/**
 * Created by SublimeText.
 * User: Huynh
 * Date: 18/12/2017
 * Time: 15:00
 */
class ImageController extends \App\Http\Controllers\WebApiController
{   
  public function actionFind(Request $request)
  { 
    
  }

  public function actionFindOne($id)
  {   
   
  }

  public function actionSave(Request $request)
  {  
    $resImage = ImageService::getInstance()->save($request);
    if(!isset($resImage['errors'])) {
      return Api::response(['data' => $resImage['data'] ])   ;
    } else {
      return Api::response([
        'is_success' => false,
        'errors' => $resImage['errors']['msg'],
        'status_code' => $resImage['errors']['status_code'],
      ])  ;
    }
  }

  public function actionUpdate(Request $request, $id)
  {   
    
  }

  public function actionDelete($id)
  {   
     

  }
}