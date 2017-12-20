<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebApiController as WebApiController;

class UserController extends \App\Http\Controllers\WebAdmin\WebController
{
    
    public function viewIndex()
    {
        return view('admin.users.index');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('admin.users.edit');
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {
    	return view('admin.users.add');    
    }

   
}

