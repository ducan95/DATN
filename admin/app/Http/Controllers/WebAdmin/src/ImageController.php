<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;
use Illuminate\Support\Facades\Auth;

class ImageController extends WebController
{
    
    public function viewIndex()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.images.index',compact('role_code'));
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.images.eidt',compact('role_code'));
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
    	return view('admin.images.add',compact('role_code'));   
    }

   
}

