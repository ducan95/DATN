<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
  protected $table='posts';
  protected $primaryKey='id_post';
  protected $fillable = ['title', 'slug', 'status','thumbnail_path', 'id_release_number', 'content', 'time_begin', 'time_end', 'status_preview_top', 'deleted_at','id_user','password'];
  
  public function release_number()
  {
  	return $this->belongsTo(ReleaseNumbers::class, 'id_release_number', $primaryKey);
  }

  public function getItem($id){
  	return $this->findOrFail($id);
  }
}
