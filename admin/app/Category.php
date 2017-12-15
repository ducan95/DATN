<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';
    protected $primaryKey ='id_category';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function post_category(){
    	return $this->hasMany('App/Post_category','id_category','id_category');
    }
}
