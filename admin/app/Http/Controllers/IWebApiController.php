<?php
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:35
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Extention\ApiRequest;

interface IWebApiController{
  public function actionSave(Request $request);
  public function actionUpdate(Request $request, $id);
  public function actionDelete($id);
  public function actionFind(Request $request);
  public function actionFindOne($id);
}