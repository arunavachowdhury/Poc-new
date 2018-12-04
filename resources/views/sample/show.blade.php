@extends('includes.app')

@section('content')

<h1>{{$sample->name}}</h1>

<h2>IS Standards</h2>
<ul class="list-group">
@foreach($isstandards as $isstandard)
<li class="list-group-item">
    {{$isstandard->value}}
</li>
@endforeach
</ul>

<h2>Test items</h2>

<table class="table">
    <thead>
      <tr>
        <th>Test Item</th>
        <th>Unit of measurment</th>
        <th>Specified value range</th>
      </tr>
    </thead>
    <tbody>
        @foreach($testItems as $testItem)
        <tr>
            <td>{{$testItem->name}}</td>
            <td>{{$testItem->uom->unit}}</td>
            <td>{{$testItem->specified_range_from}} {{$testItem->uom->unit}} - {{$testItem->specified_range_to}} {{$testItem->uom->unit}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection