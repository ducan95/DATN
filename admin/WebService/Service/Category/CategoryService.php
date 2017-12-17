<?php
namespace WebService\Service\Category;
use WebService\Repository\Category\CategoryRepository;
use WebService\Service\Service;
use Extention\Api;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class CategoryService extends Service
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

  public function list()
  {
    $category = CategoryRepository::getInstance()->find();
    return Api::response([ 'category' => $category]);
  }

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
}