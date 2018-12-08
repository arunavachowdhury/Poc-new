@extends('layouts.app')

@section('content')


<div class="container">  
<h2>Users</h2>  
<div class="row">
    @foreach($users as $user)
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>User Type</th>
        <th>Change Permisions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->address}}</td>
        <td>{{$user->usertype}}</td>
        <td>
        @if($user->usertype == "employee")
        <a href="#" class="btn btn-primary">Make Technician</a>

        @else($user->usertype == "technician")
        <a href="#" class="btn btn-primary">Make Employee</a>

        @endif
        </td>
      </tr>
    </tbody>
  </table>
  @endforeach
  </div>
</div>



@endsection