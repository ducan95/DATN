<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;

class MemberController extends \App\Http\Controllers\WebAdmin\WebController
{
    
    public function viewIndex()
    {
        return view('admin.member.index');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('admin.member.edit');
    }

    public function viewDelete()
    {
        
    }

    public function viewFind()
    {
        
    }
    public function viewAdd()
    {   
        return view('admin.member.add');
    }

   
}

