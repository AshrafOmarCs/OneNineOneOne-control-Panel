@extends('layout.app')


@section('content')
<header class="panel-heading">
                Hover Table
              </header>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>dept ID</th>
                    <th>Name Ar</th>
                    <th>Name En</th>

                    <td>Options</td>
                   
                    
                  </tr>
                </thead>
                <tbody>
                @foreach($list as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->name_en}} </td>
                    

                    <td> <a class="btn btn-info" href="http://127.0.0.1:8000/dept/update/{{$value->id}}"> Edite</a></td>
                  </tr>
                @endforeach
                 
                </tbody>
              </table>


@endsection