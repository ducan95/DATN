<?php

namespace App\Http\Controllers\WebClient\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientReleaseController extends Controller
{
	// Load release index view
  public function index() {
  	return view('client.release.index');
  }
}
