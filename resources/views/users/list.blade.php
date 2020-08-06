@extends('layout.app')


@section('content')
 
              <header class="panel-heading">
                Hover Table
              </header>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Job ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>department_Id</th>
                    <th>Created at </th>
                    <td>Options</td>
                   
                    
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $value)
                  <tr>
                    <td>{{$value->job_id}}</td>
                    <td>{{$value->name}}</td>
                    <td>@if($value->userType_id == 1){{'Admin'}} @else {{'Client'}} @endif </td>
                    <td>{{$value->deptName}}</td>
                    <td>{{$value->created_at}}</td>
                    <td><a href="userDetails/{{$value->id}}"> View Details</a></td>
                  </tr>
                @endforeach
                 
                </tbody>
              </table>
            </section>
  
@endsection