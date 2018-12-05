@extends('layouts.app')

@section('content')

@foreach($labs as $lab)
<div class="panel panel-primary">
    <div class="panel-heading">{{$lab->name}}</div>
    <div class="panel-body">{{$lab->address}}</div>
</div>
@endforeach

@endsection