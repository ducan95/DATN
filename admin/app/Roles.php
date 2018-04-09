<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use SoftDeletes;
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role_code'
    ];

    protected function user()
    {
    	return	$this->hasMany(User::class, 'role_code');
    }
}
