<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';
    protected $primaryKey ='id_category';
    protected $fillable = ['name','slug','global_status','menu_status','id_category_parent','is_deleted','created_at','updated_at'];
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
