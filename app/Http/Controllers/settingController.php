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
    public function dept_update(Request $req,$id){
        //dd($req->all(),$id);
        $sql = "UPDATE `departments` SET `name`='".$req->name."',`name_en`='".$req->name_en."' WHERE id=".$id."";
        //dd($sql);
        $req = DB::update($sql);
        if($req){
            return redirect('dept/list');
        }else{
            return redirect('dept/update/'.$id.'');
        }
    }
    public function edite_dept($id){
        $sql = "select * from departments where id =".$id."";
        $data = DB::select($sql);
        return view('department.edite',compact('data'));
       // dd($data);
    }
}
