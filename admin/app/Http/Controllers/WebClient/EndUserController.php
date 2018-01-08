<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EndUserController extends Controller
{
  public function index(){
  	return view('client.index');
  }

  public function cat($slug,$id){ //truyen id cua danh muc tin
  	return view('client.category.index');
  }
}
