<?php
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:35
 */

namespace App\Http\Controllers;

interface WebApiControllerInterface{
  public function actionList();
  public function actionSave();
  public function actionUpdate();
  public function actionDelete();
}