<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;

class ImageController extends WebController
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

