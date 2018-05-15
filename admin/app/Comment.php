<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $table ='comments';
    protected $primaryKey = 'id_comment';

    protected $fillable = ['id_member', 'id_post','comment_content'];
}
