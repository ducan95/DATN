<?php
namespace WebService\Repository;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:34
 */
interface IRepository
{
  public function save($request);
  public function update($request, $id);
  public function delete($id);
  public function find($dataRes);
  public function findOne($id);
}