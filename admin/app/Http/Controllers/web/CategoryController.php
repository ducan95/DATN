<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends \App\Http\Controllers\WebController
{
    
    public function viewIndex()
    {
        return view('templates.admin.category.category');
    }

    public function viewPost()
    {
        
    }

    public function viewEdit()
    {
        return view('templates.admin.category.editcategorychildren');
    }

    public function viewDelete()
    {
        
    }

    public function viewAddChildren()
    {
        return view('templates.admin.category.addcategorychildern');
    }
    public function viewAdd()
    {
    	return view('templates.admin.category.addcategory');    
    }
    public function viewSetdisplay()
    {
        return view('templates.admin.category.setdisplay');
    }
    public function viewFind()
    {
        
    }

   
}

