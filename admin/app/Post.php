<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table='posts';
  protected $primaryKey='id_post';
  protected $fillable = ['title', 'slug', 'status','thumbnail_path', 'id_release_number', 'content', 'time_begin', 'time_end', 'status_preview_top', 'deleted_at', 'is_deleted', 'id_user','password'];
  
  public function release_number()
  {
  	return $this->belongsTo(ReleaseNumbers::class, 'id_release_number', $primaryKey);
  }

}
