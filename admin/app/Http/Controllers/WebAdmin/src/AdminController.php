<?php

namespace App\Http\Controllers\WebAdmin\src;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role_code = Auth::user()->role_code;
        if($role_code == 'admin' || $role_code == 's_admin'){
        return view('admin.release.index', compact('role_code'));
        }
        if($role_code == 'editor'){
        return view('admin.release.index', compact('role_code'));
        }
        if($role_code == 'user'){
        return view('admin.posts.index', compact('role_code'));
        }
    }

}
