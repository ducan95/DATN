<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table ='categories';
    protected $primaryKey ='id_category';
    protected $fillable = ['name','slug','global_status','menu_status','id_category_parent'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    public function post_category(){
    	return $this->hasMany(PostCategory::class,'id_category','id_category');
    }
    public function post(){
        return $this->hasMany(Post::class,'post_category','id_post','id_category');
    }
    public function getItem($id){
        return $this->findOrFail($id);
    }
}
