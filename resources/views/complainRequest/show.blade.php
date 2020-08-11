@extends('layout.app')


@section('content')

<section class="panel">
              <header class="panel-heading">
                Complain requests deatils :
              </header>
              <div class="panel-body">
                <section class="panel">

              <div >
              <center>
              <img style="    
              width: 400px;
              border-radius: 9px;
              box-shadow: 0 0 1px;" src="http://127.0.0.1:8000/img/background2.jpg" alt="img ">
              </div>
              </center>
<br>

            <table class="table table-striped">
                <header class="panel-heading">
                Issued By :
              </header>
                <tbody>

                  <th>Job ID </th>
                  <th>Technical Name</th>
                  <th>Provided Company</th>
                  <th>Department </th>
                  <th>Permession Expiry </th>
                  </tr>
                  <tr>
                  <th>{{$workerInfo[0]->job_id}} </th>
                  <td>{{$workerInfo[0]->name}}</td>
                  <td>{{$workerInfo[0]->companyName}}</td>
                  <td>{{$workerInfo[0]->dept_en}} | {{$workerInfo[0]->dept_ar}}</td>
                  <th>{{$workerInfo[0]->permessionExpiry}}</th>
                  </tr>
              
                </tbody>
              
                <tbody>

                </table>
 <br>
          <table class="table table-striped">
              <header class="panel-heading">
                Complain Request Details :
              </header>
                  <tr>
                    <td>  No  </td>
                    <td>{{$data[0]->id}}</td>
                  </tr>
                  <tr>
                    <td>Title </td>
                    <td>{{$data[0]->name}}</td>
                  </tr>
                  <tr>
                    <td>Status </td>
                    <td><?php
                    if($data[0]->status_id == 1){
                      echo "Panding";
                    }elseif($data[0]->status_id == 2){
                      echo "Underprocess";
                    }elseif($data[0]->status_id == 3){
                      echo "Done";
                    }elseif($data[0]->status_id == 4){
                      echo "cancelled";
                    }else{
                      echo "Unknown";
                    }
                    ?></td>
                  </tr>
                  <tr>
                    <td>Complain Catogry Ar </td>
                    <td>{{$data[0]->name_ar}}</td>
                  </tr>
                  <tr>
                    <td>Complain Catogry En </td>
                    <td>{{$data[0]->name_enn}}</td>
                  </tr>
                  <tr>
                    <td>Angury Qty  </td>
                    <td>{{$data[0]->anguryQty}}</td>
                  </tr>
                  <tr>
                    <td>Death Qty  </td>
                    <td>{{$data[0]->deathQty}}</td>
                  </tr>
                  <tr>
                    <td>created at </td>
                    <td>{{$data[0]->created_at}}</td>
                  </tr>
                  <tr>
                  </tr>
                  <tr>
                  <td>Options </td>
                  <td><a href="http://127.0.0.1:8000/complain/delete/{{$data[0]->id}}" class="btn btn-danger">Delete</a></td>
                  </tr>
                 

                </tbody>
              </table>
<br>
              <table class="table table-striped">
              <header class="panel-heading">
                Assign a mission to :
              </header>
                <tbody>

                  <tr>
                  <td>
                  <form action="http://127.0.0.1:8000/complain/assighnTo/{{$data[0]->id}}" method="post" style="    margin-top: 15px;">
                  @csrf
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Assign a mission to <span class="required">:</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="tecniacl_id">
                        @foreach($workers as $value)
                            <option value="{{$value->id}}">{{$value->name}} | {{$value->companyName}} | {{$value->dept_en}} ,{{$value->dept_ar}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Confirm</button>
                        <button class="btn btn-default" type="clear">Cancel</button>
                      </div>
                    </div>
                  </form>
                  </td>
                 
                  </tr>
              
                </tbody>
              
                <tbody>

                </table>

            </section>






                <!-- Modal -->

                <!-- Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Delete the User ! </h4>
                      </div>
                      <div class="modal-body">

                        Are you sure you want to delete current User ? 

                      </div>
                      <div class="modal-footer">
                      <a class="btn btn-danger" href="http://127.0.0.1:8000/Delete/users/{{$data[0]->id}}" >Delete</a>
                       
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal -->

              </div>
            </section>
@endsection