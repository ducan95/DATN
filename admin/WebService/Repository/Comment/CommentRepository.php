<?php
namespace WebService\Repository\Comment;
use App\Comment;
use App\Post;
use App\Member;
use WebService\Repository\Repository;

use DB;


class CommentRepository extends Repository
{

  public function save($dataReq)
  {
    try{
      $comment = new Comment();
      $comment->fill([
        'id_member' => $dataReq['id_member'],
        'id_post' => $dataReq['id_post'],
        'comment_content'=> $dataReq['comment_content']
      ]);
      $comment->save();
      return $comment;
    }
    catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  public function update($dataReq,$id)
  {
    
  }

  public function delete($id)
  {
    try {
        if(!empty(Comment::find($id))) {
          $comment = Comment::find($id);
          $comment->delete();
        } else {
          return ;
        }
      } catch(\Exception  $e) { 
        throw $e;
      }
  }



    public function findOne($id)
    {

    }

    public function find($dataReq)
    {
        
    }
    public function getComment($id){
        try{
            $comment = DB::table('comments')->join('posts', function($join) {
                $join->on('comments.id_post', '=', 'posts.id_post');  })
                ->join('members', function($join) {
                $join->on('comments.id_member', '=', 'members.id_member');  })->where('comments.id_post','=',$id)->select('members.email','comments.comment_content')->get();
            return $comment;
          } catch(\Exception $e){
            throw $e;
          }
    }
    
    public function getAllComment(){
        try{
            $comment = DB::table('comments')->join('posts', function($join) {
                $join->on('comments.id_post', '=', 'posts.id_post');  })
              ->join('members', function($join) {
                $join->on('comments.id_member', '=', 'members.id_member');  })->select('members.email', 'posts.title','comments.comment_content')->get();
            return $comment;
        }catch(\Exception $e){
            throw $e;
        }
    }

}
    
    

       

