<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';
    protected $primaryKey='id_post';
    public function release_number(){
    	return $this->belongsTo('App/release_number','id_release_number',$primaryKey);
    }
}
