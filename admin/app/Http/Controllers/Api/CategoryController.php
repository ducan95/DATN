<?php
namespace App\Http\Controllers\Api;
use WebService\Service\Category\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class CategoryController extends \App\Http\Controllers\WebApiController
{
  public function actionList(){
    return CategoryService::getInstance()->list();
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