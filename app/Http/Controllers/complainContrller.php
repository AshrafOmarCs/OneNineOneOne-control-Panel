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
        $data = DB::select("SELECT complainRequests.*,complains.name as name_ar ,complains.name_en as name_enn FROM `complainRequests` JOIN complains ON complains.id = complainRequests.id WHERE complainRequests.id=".$id."");
        $workers = DB::select("SELECT users.*,departments.name_en as dept_en ,departments.name as dept_ar FROM `users` JOIN departments ON departments.id = users.id WHERE users.userType_id=2");
        //dd($workers);
        return view('complainRequest.show',compact('data','workers'));
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
}
