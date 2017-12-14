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
  public function save();
  public function update();
  public function delete();
  public function find();
  public function findOne();
}