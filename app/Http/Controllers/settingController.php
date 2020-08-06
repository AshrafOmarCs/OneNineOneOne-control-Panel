<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class settingController extends Controller
{
    // 
    public function list(){
        $list = DB::table('departments')->get();
        //dd($list);
        return view('department.list',compact('list'));
    }
    public function create(){
        return view('department.create');
    }
    public function complain(){
        $list = DB::table('complains')->get();
        //dd($list);
        return view('complain.list',compact('list'));
    }
    public function complainCreate(){
        return view('complain.create');
    }
    public function storeDept(Request $req){
        //dd($req->all());
        $sql = "INSERT INTO `departments`(`name`, `name_en`) VALUES ('".$req->name."','".$req->name_en."')";
        $res = DB::insert($sql);
        if($res){
            return redirect('http://127.0.0.1:8000/dept/list');
        }else{
            return redirect('http://127.0.0.1:8000/dept/create');
        }
    }
    public function storeCompy(Request $req){
        //dd($req->all());
        $sql = "INSERT INTO `complains`(`name`, `name_en`) VALUES ('".$req->name."','".$req->name_en."')";
        $res = DB::insert($sql);
        if($res){
            return redirect('http://127.0.0.1:8000/compy/list');
        }else{
            return redirect('http://127.0.0.1:8000/compy/add');
        }
    }
}
