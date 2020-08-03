<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index(){
        return view('admin.users');
    }
    public function Dashboard(){
        return view('admin.dashboard');
    }
}
