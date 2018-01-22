<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;
use Illuminate\Support\Facades\Auth;

class MemberController extends \App\Http\Controllers\WebAdmin\WebController
{
    
    public function viewIndex()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.member.index',compact('role_code'));
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.member.edit',compact('role_code'));
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
        return view('admin.member.add',compact('role_code'));
    }

   
}

