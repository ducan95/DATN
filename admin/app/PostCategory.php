<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';
    public function post(){
    	return $this->belongsTo(Post::class,'id_post','id_post');
    }

    public function category(){
    	return $this->belongsTo(Category::class,'id_category','id_category');
    }
}
