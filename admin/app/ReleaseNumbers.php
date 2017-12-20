<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReleaseNumbers extends Model
{
    protected $table='release_numbers';
    protected $primaryKey ='id_release_number';
    public function posts(){
    	return $this->hasMany(Post::class,'id_post',$primaryKey);
    }
}
