<?php

namespace App\Http\Controllers;
use DB;

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
    public function CreateUser(){
        $departments = DB::table('departments')->get();
        //dd($departments);
        return view('users.create',compact('departments'));
    }
    public function usersList(){
        $data = DB::select("SELECT users.*,departments.name as 'deptName' FROM `users` JOIN departments ON departments.id = users.department_Id");
        return view('users.list',compact('data'));
    }
    public function storeUser(Request $req){
        // dd($req->all());
        if($req->name == null || $req->phone == null || $req->company_name == null || $req->job_id == null || $req->password == null || $req->permessionExpiry == null ){
            $departments = DB::table('departments')->get();
            //dd($departments);
          
            return view('users.create',compact('departments'));
        }else{

        }
        if($req->rePass == $req->password ){
            $md5 =  md5($req->rePass);
         }else{
            return redirect('CreateUser'); 
         }
        $username = 'user'.rand(1111,9999);
        //dd(gettype($username));
        $sql = "INSERT INTO `users`(`name`, `phone`, `job_id`, `permessionExpiry`, `userType_id`, `department_Id`, `password`,username,companyName) VALUES 
        ('".$req->name."','".$req->phone."','".$req->job_id."','".$req->permessionExpiry."','".$req->userType."','".$req->dept_id."','".$md5."','".$username."','".$req->company_name."')";

        $res = DB::insert($sql);
        if($res){
            return redirect('usersList');
            session(['status' => 'true']);
        }else{
            return redirect('CreateUser');
        }
    }
    public function DeleteUser($id){
     $data = DB::delete("DELETE FROM `users` WHERE id=".$id."");
     if($data){
        return redirect('usersList');
        session(['status' => 'true']);
    }else{
        return redirect('CreateUser');
    }
    }
    public function userDetails($id){
        $data = DB::select("SELECT users.*,departments.name as deptName ,departments.name_en as deptName_en FROM users join departments ON users.department_Id = departments.id where users.id=".$id."");
        return view('users.show',compact('data'));
    }
    public function userEdite($id){
        $data = DB::select("select * from users where id =".$id."");
        return view('users.edite',compact('data'));
    }
    public function updateUser(Request $req,$id){
        $arr = array('id'=>$id,'request'=>$req->all());
        if($req->rePass != null){
            if($req->rePass == $req->password){
                $md5 =  md5($req->rePass);
                echo $md5;
                if($req->permessionExpiry == ''){
                 echo "permition is null";
                 $sql = "UPDATE `users` SET `name`='".$req->name."',`companyName`='".$req->company_name."',`phone`='".$req->phone."',`job_id`='".$req->job_id."',password = '".$md5."' WHERE id=".$id."";
                 }else{
                     $sql = "UPDATE `users` SET `name`='".$req->name."',`companyName`='".$req->company_name."',`phone`='".$req->phone."',`job_id`='".$req->job_id."',`permessionExpiry`='".$req->permessionExpiry."',password = '".$md5."' WHERE id=".$id."";
                     echo "permision is not null";    
             }  
             }else{
                 
             }
        }else{
            if($req->permessionExpiry == ''){
                $sql = "UPDATE `users` SET `name`='".$req->name."',`companyName`='".$req->company_name."',`phone`='".$req->phone."',`job_id`='".$req->job_id."' WHERE id=".$id."";
            }else{
                $sql = "UPDATE `users` SET `name`='".$req->name."',`companyName`='".$req->company_name."',`phone`='".$req->phone."',`job_id`='".$req->job_id."',`permessionExpiry`='".$req->permessionExpiry."' WHERE id=".$id."";
            }
            
        }

        
        $res = DB::update($sql);
        if($res){
            return redirect('http://127.0.0.1:8000/userEdite/'.$id.'');
        }else{
            return redirect('http://127.0.0.1:8000/userEdite/'.$id.'');
        }
    }
    public function login(){
        
        return view('admin.login');
    }
    public function loginAdmin(Request $req){
        $pass = md5($req->pass);
        
        $sql = "select * from users where username='".$req->username."' and password='".$pass."'";
        $res = DB::select($sql);
        if($res){
            \Session::put('auth',$res[0]);
            $auth = \Session::get('auth');
           return redirect('Dashboard');
        }else{
            \Session::put('error','Credinitals not correct ');
            return redirect('/');
        }
        //dd($res);
    }
}
