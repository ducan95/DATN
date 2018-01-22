<?php

namespace WebService\Service\PostCategory;

use Validator;
use WebService\Service\Service;
use Illuminate\Support\Facades\Auth;
use WebService\Repository\PostCategory\PostcategoryRepository;

class PostcategoryService extends Service
{
	public function save($request){
      try{
        $res['data']= PostcategoryRepository::getInstance()->save($request->all());
      }catch(\Exception $e){
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }
    return $res;
	}
	public function update($request, $id){

	}
	public function delete($id){

	}
	public function find($request){
	  
	}
	public function findOne($id){

	}


  
}