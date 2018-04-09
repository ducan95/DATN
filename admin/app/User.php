<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    //Redifine primary key
    protected $primaryKey ='id_user';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','status','role_code',
    ];

    // Redifine primary key
    // protected $primaryKey = 'id_user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRememberToken() { 
        return null; 
    }
     
    public function setRememberToken($value) { 
        
    } 

    public function getRememberTokenName() { 
        return null; 
    }
}
