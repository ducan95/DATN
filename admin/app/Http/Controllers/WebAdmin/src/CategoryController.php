<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebAdmin\WebApiController as WebApiController;

class CategoryController extends \App\Http\Controllers\WebAdmin\WebController
{
    
    public function viewIndex()
    {
        return view('admin.category.category');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('admin.category.editcategorychildren');
    }

    public function viewEditParent(){
        return view("admin.category.editcategory");
    }

    public function viewDelete()
    {
        
    }

    public function viewAddChildren()
    {
        return view('admin.category.addcategorychildern');
    }
    public function viewAdd()
    {
    	return view('admin.category.addcategory');    
    }
    
    public function viewFind()
    {
        
    }

   
}

