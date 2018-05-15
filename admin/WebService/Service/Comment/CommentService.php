<?php
namespace WebService\Service\Comment;
use WebService\Repository\Comment\CommentRepository;
use WebService\Service\Service;
use Validator;
 
class CommentService extends Service
{ 
	public function find($request)
	{ 
    
	}
   	
 	public function findOne($id)
    {	
        
    }


    public function save($request)
    {	
        try{
            $res['data']= CommentRepository::getInstance()->save($request->all());
          }catch(\Exception $e){
            $res['errors']['msg'] = $e->getMessage();
            $res['errors']['status_code'] = 500;
          }
        return $res;
        
    }

    public function update($request, $id)
    {     
    }

    public function delete($id)
    {
       
    }
    public function getComment($id){
        try{
            $res['data']= CommentRepository::getInstance()->getComment($id);
          }catch(\Exception $e){
            $res['errors']['msg'] = $e->getMessage();
            $res['errors']['status_code'] = 500;
          }
        return $res;
    }
     public function getAllComment(){
         try{
             $res['data']=CommentRepository::getInstance()->getAllComment();
            }
            catch(\Exception $e){
            $res['errors']['msg'] = $e->getMessage();
            $res['errors']['status_code'] = 500;
            }
            return $res;
     }
}