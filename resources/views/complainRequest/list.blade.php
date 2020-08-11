@extends('layout.app')


@section('content')

<section class="panel">
              <header class="panel-heading">
                Complain List 
              </header>
              <table class="table">
                <thead>
                 
                  <tr>
                    <th>Complain_id</th>
                    <th>Name</th>
                    <th>Angury qty</th>
                    <th>Death qty</th>
                    <th>Published at </th>
                    <th>Location</th>
                    <th>status</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($list as $value)
                  <tr class="active">
                  <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->anguryQty}}</td>
                    <td>{{$value->deathQty}}</td>
                    <td>{{$value->created_at}}</td>
                  
                    <td><a href="http://127.0.0.1:8000/" class="btn btn-danger">Map</a></td>
                    <td>
                    <?php
                    if($value->status_id == 1){
                      echo "Panding";
                    }elseif($value->status_id == 2){
                      echo "Underprocess";
                    }elseif($value->status_id == 3){
                      echo "Done";
                    }elseif($value->status_id == 4){
                      echo "cancelled";
                    }else{
                      echo "Unknown";
                    }
                    ?></td>
                    <td> <a href="http://127.0.0.1:8000/complain/edite/{{$value->id}}" class="btn btn-success">Edite</a> | <a href="http://127.0.0.1:8000/complain/show/{{$value->id}}" class="btn btn-info">view</a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </section>



@endsection