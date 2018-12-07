@extends('layouts.app')

@section('content')


<div class="container">  
<h2>Labs</h2>  
<div class="row">
    @foreach($labs as $lab)
    <table class="table table-hover">
    <thead>
      <tr>
        <th>Lab</th>
        <th>Address</th>
        <th>Allocate Technician</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$lab->name}}</td>
        <td>{{$lab->address}}</td>
        <td>
        <a href="{{route('lab.show',['id'=> $lab->id])}}" class="btn btn-primary">Allocate</a>
        </td>
      </tr>
    </tbody>
  </table>
  @endforeach
  </div>
</div>



@endsection