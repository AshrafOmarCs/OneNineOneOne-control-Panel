@extends('layout.app')


@section('content')

<section class="panel">
              <header class="panel-heading">
                User deatils :
              </header>
              <div class="panel-body">



                <section class="panel">
 
              <table class="table table-striped">
                <thead>
                  <tr>
                 
                    <th> </th>
                    <th> </th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>name </td>
                    <td>{{$data[0]->name}}</td>
                  </tr>
                  <tr>
                    <td>username </td>
                    <td>{{$data[0]->username}}</td>
                  </tr>
                  <tr>
                    <td>phone </td>
                    <td>{{$data[0]->phone}}</td>
                  </tr>
                  <tr>
                    <td>job_id </td>
                    <td>{{$data[0]->job_id}}</td>
                  </tr>
                  <tr>
                    <td>permessionExpiry </td>
                    <td>{{$data[0]->permessionExpiry}}</td>
                  </tr>
                  <tr>
                    <td>Company Name  </td>
                    <td>{{$data[0]->companyName}}</td>
                  </tr>
                  <tr>
                    <td>department  </td>
                    <td>{{$data[0]->deptName_en}}</td>
                  </tr>
                  <tr>
                    <td>created at </td>
                    <td>{{$data[0]->created_at}}</td>
                  </tr>
                    <tr>
                    <td></td>
                <td><a class="btn btn-danger" style="float: right;
    margin: 10px" data-toggle="modal" href="#myModal3">
                    Delete
                </a> <a class="btn btn-success" style="float: right;
    margin: 10px" data-toggle="modal" href="http://127.0.0.1:8000/userEdite/{{$data[0]->id}}">
                    Edite
                </a></td>
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