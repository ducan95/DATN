<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\ReleaseNumber\ReleaseNumberService;
use App\Http\Controllers\Api\WebApiController as WebApiController;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class ReleaseNumberController extends \App\Http\Controllers\Api\WebApiController
{
  public function actionList(){
    return ReleaseNumberService::getInstance()->find();
  }

  public function actionSave()
  {
    // TODO: Implement actionSave() method.
  }

  public function actionUpdate()
  {
    // TODO: Implement actionUpdate() method.
  }

  public function actionDelete()
  {
    // TODO: Implement actionDelete() method.
  }
}