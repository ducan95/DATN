<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReleaseController extends Controller
{
    public function viewIndex()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.release.index',compact('role_code'));
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.release.edit',compact('role_code'));
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
    	return view('admin.release.add',compact('role_code'));    
    }

}
