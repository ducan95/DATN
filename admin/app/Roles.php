<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_role';

    protected function user()
    {
    	return	$this->hasMany(User::class, 'id_role');
    }
}
