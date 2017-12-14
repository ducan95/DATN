<?php
namespace App\Http\Controllers\Api;
use WebService\Service\ReleaseNumber\ReleaseNumberService;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class ReleaseNumberController extends \App\Http\Controllers\WebApiController
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