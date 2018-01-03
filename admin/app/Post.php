<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table='posts';
  protected $primaryKey='id_post';
  protected $fillable = ['title', 'slug', 'status','thumbnail_path', 'id_release_number', 'time_begin', 'time_end', 'status_preview_top', 'deleted_at', 'is_deleted', 'url_image', 'id_user'];
  
  public function release_number()
  {
  	return $this->belongsTo(ReleaseNumbers::class, 'id_release_number', $primaryKey);
  }

}
