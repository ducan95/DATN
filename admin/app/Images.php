<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'description', 'path', 'path_paint', 'is_deleted'];
    protected $primaryKey = 'id_image';

    public function post() {
    	return $this->belongsToMany(Post::class,'ImagePost', 'id_image', 'id_post');
    }

}
