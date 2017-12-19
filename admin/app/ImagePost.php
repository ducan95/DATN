<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'description', 'path', 'path_paint', 'is_deleted'];
    protected $primaryKey = 'id_image',

    /*public function image() {
    	return $this->hasMany(Images::class, 'id_image_post', 'id_post_image');
    }*/
}
