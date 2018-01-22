<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebController as WebController;
use Illuminate\Support\Facades\Auth;

class CategoryController extends \App\Http\Controllers\WebAdmin\WebController
{
     
    public function viewIndex()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.category.category',compact('role_code'));
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.category.editcategorychildren',compact('role_code'));
    }

    public function viewEditParent(){
        $role_code = Auth::user()->role_code;
        return view("admin.category.editcategory",compact('role_code'));
    }

    public function viewDelete()
    {
        
    }

    public function viewAddChildren()
    {
        $role_code = Auth::user()->role_code;
        return view('admin.category.addcategorychildern',compact('role_code'));
    }
    public function viewAdd()
    {
        $role_code = Auth::user()->role_code;
    	return view('admin.category.addcategory',compact('role_code'));    
    }
    
    public function viewFind()
    {
        
    }

   
}

