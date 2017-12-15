<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_category extends Model
{
    protected $table = 'post_category';
    public function post(){
    	return $this->belongsTo('App/Post','id_post','id_post');
    }

    public function category(){
    	return $this->belongsTo('App/Category','id_category','id_category');
    }
}
