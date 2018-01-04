<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    protected $table	    ='release_numbers';
    protected $primaryKey ='id_release_number';
    protected $fillable 	= ['name', 'image_release_path','image_header_path', 'is_deleted'];
    
    public function posts(){
    	return $this->hasMany(Post::class,'id_post',$primaryKey);
    }
}
