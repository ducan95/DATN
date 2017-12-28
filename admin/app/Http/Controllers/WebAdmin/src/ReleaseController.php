<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReleaseController extends Controller
{
    public function viewIndex()
    {
        return view('admin.release.index');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('admin.release.edit');
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {
    	return view('admin.release.add');    
    }

}
