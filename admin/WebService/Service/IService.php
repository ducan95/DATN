<?php
namespace WebService\Service;

interface IService
{
  public function save($request);
  public function update($request, $id);
  public function delete($id);
  public function find($dataReq);
  public function findOne($id);
}