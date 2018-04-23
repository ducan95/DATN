<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Release extends Model
{
    use SoftDeletes;
    protected $table	    ='release_numbers';
    protected $primaryKey ='id_release_number';
    protected $fillable 	= ['name', 'image_release_path'];
    
    public function posts(){
    	return $this->hasMany(Post::class,'id_post',$primaryKey);
    }

    public function getItem($id){
    	return $this->findOrFail($id);
    }
}
