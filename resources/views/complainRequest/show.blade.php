@extends('layout.app')


@section('content')

<section class="panel">
              <header class="panel-heading">
                Complain requests deatils :
              </header>
              <div class="panel-body">
                <section class="panel">
 
              <table class="table table-striped">
                <thead>

                  <tr>

                    <th>Image</th>
                    <th> <img src="" alt="img "></th>
                  
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>No  </td>
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
                  <form action="" method="post">
                  <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Assign a mission to <span class="required">:</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="userType">
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

                  </tr>

                </tbody>
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