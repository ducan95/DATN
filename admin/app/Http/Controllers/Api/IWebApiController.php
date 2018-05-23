<?php


namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Extention\ApiRequest;

interface IWebApiController{
  public function actionSave(Request $request);
  public function actionUpdate(Request $request, $id);
  public function actionDelete($id);
  public function actionFind(Request $request);
  public function actionFindOne($id);
}