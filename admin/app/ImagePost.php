<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    protected $table = 'post_image';
    protected $fillable = ['id_image', 'id_post', 'is_deleted'];
    protected $primaryKey = 'id_post_image',


}
