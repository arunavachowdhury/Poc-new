@extends('includes.app')

@section('content')

<form action="{{route('sample.store')}}" method="post">
{{csrf_field()}}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection
