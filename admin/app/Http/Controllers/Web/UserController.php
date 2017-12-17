<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends \App\Http\Controllers\WebController
{
    
    public function viewIndex()
    {
        return view('templates.admin.users.index');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('templates.admin.users.edit');
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {
    	return view('templates.admin.users.add');    
    }

   
}