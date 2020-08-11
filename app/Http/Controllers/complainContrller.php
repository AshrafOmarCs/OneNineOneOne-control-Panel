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
    public function delete($id){
        $res = DB::delete("DELETE FROM `complainRequests` WHERE id=".$id."");
        if($res){
            return redirect('complain/list');
        }else{
            return redirect('complain/list');
        }
    }
    public function show($id){
        $data = DB::select("SELECT complainRequests.*,complains.name as name_ar ,complains.name_en as name_enn FROM `complainRequests` JOIN complains ON complains.id = complainRequests.complain_id WHERE complainRequests.id=".$id."");
        
        $workerInfo = DB::select("SELECT users.* , departments.name as dept_ar,departments.name_en as dept_en FROM `users` join departments ON departments.id = users.department_Id where users.id =".$data[0]->issuedBy."");
        $workers = DB::select("SELECT users.*,departments.name_en as dept_en ,departments.name as dept_ar FROM `users` JOIN departments ON departments.id = users.department_Id WHERE users.userType_id=2");
       //dd($workerInfo);
        return view('complainRequest.show',compact('data','workers','workerInfo'));
    }
    public function filter(){
        $depts = DB::table('complains')->get();
        return view('complainRequest.filter',compact('depts'));
    }
    public function checking(Request $req){
       
       if($req->from != null){
        if($req->status !=null){
            if($req->dept != null){
                $sql = "SELECT * FROM complainRequests WHERE created_at BETWEEN '".$req->from."' and '".$req->to."' AND status_id = ".$req->status." and `complain_id` = ".$req->dept." ORDER BY created_at ASC";
            //there is fromTo and status and dept query 
            }else{
                $sql = "SELECT * FROM complainRequests WHERE created_at BETWEEN '".$req->from."' and '".$req->to."' AND status_id = ".$req->status." ORDER BY created_at ASC";
                //there is fromTo and status and no dept query 
            }
        }else{
            //there is fromTo and no status query 
            if($req->dept != null){
                //there is dept and no status
                $sql = "SELECT * FROM complainRequests WHERE created_at BETWEEN '".$req->from."' and '".$req->to."' AND complain_id =".$req->dept." ORDER BY created_at ASC";
                //there is status and no dept 
            }else{
                $sql = "SELECT * FROM complainRequests WHERE created_at BETWEEN '".$req->from."' and '".$req->to."' ORDER BY created_at ASC";

            }
        }
       }else{
        //there is no fromTo query
        if($req->status !=null){
           if($req->dept != null){
            //there is satatus and dept
            $sql = "SELECT * FROM complainRequests WHERE status_id = ".$req->status." and `complain_id` = ".$req->dept." ORDER BY created_at ASC";
           }else{
            $sql = "SELECT * FROM complainRequests WHERE status_id = ".$req->status." ORDER BY created_at ASC";
            //there is status and no dept 
           }
        }else{
           
            if($req->dept != null){
                //there is dept and no status
            $sql = "SELECT * FROM complainRequests WHERE `complain_id` = ".$req->dept." ORDER BY created_at ASC";
               }else{
                $sql = "SELECT * FROM complainRequests ORDER BY created_at ASC";
                //there is status and no dept 
            }

        }

       }
       //dd($sql);
        $list = DB::select($sql);
       // dd($list);
       return view('complainRequest.result',compact('list'));
    }
    public function assighnTo(Request $req,$id){
       // dd($req->all(),$id);
        $sql = "UPDATE `complainRequests` SET status_id=2 ,technial_id=".$req->tecniacl_id." where id=".$id."";
        $res = DB::update($sql);
        if($res){
            return redirect('http://127.0.0.1:8000/complain/list');
        }else{
            return redirect('http://127.0.0.1:8000/complain/show/'.$id.'');
        }
    }
    public function UpdateComCat($id){
        $sql = "select * from complains where id =".$id."";
        $data = DB::select($sql);
        return view('complain.edite',compact('data'));
    }
    public function updateStore(Request $req,$id){
        //dd($req->all(),$id);
        $sql = "UPDATE `complains` SET `name`='".$req->name."',`name_en`='".$req->name_en."' WHERE id=".$id."";
        //dd($sql);
        $req = DB::update($sql);
        if($req){
            return redirect('compy/list');
        }else{
            return redirect('compalin/update/'.$id.'');
        }
    }
}
