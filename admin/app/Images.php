<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $primaryKey = 'id_image';

    protected $fillable = ['name', 'description', 'path', 'path_blur', 'is_deleted'];
    

   /* public function post() {
    	return $this->belongsToMany('App\Post', 'post_image', 'id_image', 'id_post');
    }*/

}
