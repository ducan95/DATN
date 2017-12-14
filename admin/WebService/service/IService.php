<?php
namespace WebService\Service;

interface IService
{
  public function save();
  public function update();
  public function delete();
  public function find();
  public function findOne();
}