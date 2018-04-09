<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends /*Model*/ Authenticatable
{
    use SoftDeletes;
    protected $table ='members';
    protected $primaryKey ='id_member';

    protected $fillable = ['email','password','birthday','gender','is_receive_email','member_plan_code','is_active'];
   
    public $timestamps = true;

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
