<?php
namespace WebService\Repository\Category;
use App\Category;
use WebService\Repository\Repository;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class CategoryRepository extends Repository
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
    $category=Category::all();
    return $category;
  }

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
}
