<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebApiController as WebApiController;
use Illuminate\Support\Facades\Auth;

class PostController extends \App\Http\Controllers\WebAdmin\WebController
{
    
    public function checkRole(){
        return Auth::user()->role_code;
    }
    public function viewIndex()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.posts.index',compact('role_code'));
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.posts.editpost',compact('role_code'));
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {
        $role_code = Auth::user()->role_code;
    	return view('admin.posts.creatpost',compact('role_code'));    
    }

   
}

