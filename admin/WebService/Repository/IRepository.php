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
  public function save($dataReq);
  public function update($dataReq, $id);
  public function delete($id);
  public function find($dataReq);
  public function findOne($id);
}
