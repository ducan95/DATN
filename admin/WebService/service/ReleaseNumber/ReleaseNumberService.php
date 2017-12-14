<?php
namespace WebService\Service\ReleaseNumber;
use WebService\Repository\ReleaseNumber\ReleaseNumberRepository;
use WebService\Service\Service;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class ReleaseNumberService extends Service
{

  public function save()
  {
    // TODO: Implement save() method.
  }

  public function update()
  {
    // TODO: Implement update() method.
  }

  public function delete()
  {
    // TODO: Implement delete() method.
  }

  public function find()
  {
    return ReleaseNumberRepository::getInstance()->find();
  }

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
}