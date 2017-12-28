<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EndUserController extends Controller
{
  public function index(){
  	return view('client.index');
  }
}
