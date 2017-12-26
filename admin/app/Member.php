<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table ='members';
    protected $primaryKey ='id_member';
    protected $fillable = ['email','password','birthday','gender','is_receive_email','status','is_deleted','created_at','updated_at'];
   
    public $timestamps = true;
}
