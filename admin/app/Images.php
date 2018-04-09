<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use SoftDeletes;
    protected $table = 'images';

    protected $primaryKey = 'id_image';

    protected $fillable = ['name', 'description', 'path', 'path_blur'];
    

   /* public function post() 
    {
    	return $this->belongsToMany('App\Post', 'post_image', 'id_image', 'id_post');
    }*/

}
