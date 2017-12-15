<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class release_numbers extends Model
{
    protected $table='release_numbers';
    protected $primaryKey ='id_release_number';
    public function posts(){
    	return $this->hasMany('App/posts','id_post',$primaryKey);
    }
}
