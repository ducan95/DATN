<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;
use Illuminate\Support\Facades\Auth;


class CommentController extends \App\Http\Controllers\WebAdmin\WebController
{
    
    public function viewIndex()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.comments.index',compact('role_code'));
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {
        
    }

   
}

