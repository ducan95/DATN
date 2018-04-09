<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostImage extends Model
{
    use SoftDeletes;
    protected $table= 'post_image';
    protected $primaryKey = 'is_post_image';
    protected $filltable = ['id_post', 'is_image'];
}
