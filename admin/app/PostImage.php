<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table= 'post_image';
    protected $primaryKey = 'is_post_image';
    protected $filltable = ['id_post', 'is_image', 'is_deleted'];
}
