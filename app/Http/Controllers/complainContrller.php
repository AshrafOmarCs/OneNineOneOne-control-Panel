<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class complainContrller extends Controller
{
    //
    public function list(){
        $list = DB::table('complainRequests')->get();
        
        return view('complainRequest.list',compact('list'));
    }
}
