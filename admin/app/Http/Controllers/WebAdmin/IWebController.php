<?php
/**
 * Created by rikker intern pro team.
 * User: rikkei
 * Date: 15/12/2017
 * Time: 09:43
 */

namespace App\Http\Controllers\WebAdmin;
use Illuminate\Http\Request;

interface IWebController{
  public function viewIndex();
  public function viewPost();
  public function viewAdd();
  public function viewEdit();
  public function viewDelete();
  public function viewFind();
}