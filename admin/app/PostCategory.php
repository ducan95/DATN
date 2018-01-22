<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';
    protected $fillable = ['id_post','id_category','is_deleted'];
    public function post(){
    	return $this->belongsTo(Post::class,'id_post','id_post');
    }

    public function category(){
    	return $this->belongsTo(Category::class,'id_category','id_category');
    }
    //lấy category
    public function getItem($id){
    	return $this->where('id_category',$id)->get();
    }
}
