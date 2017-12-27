<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'description', 'path', 'path_blur', 'is_deleted'];
    protected $primaryKey = 'id_image';
}
