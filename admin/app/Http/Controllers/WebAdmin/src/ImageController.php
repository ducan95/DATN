<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;

class ImageController extends WebController
{
    
    public function viewIndex()
    {
        return view('admin.images.index');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('admin.images.eidt');
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {
    	return view('admin.images.add');   
    }

   
}

