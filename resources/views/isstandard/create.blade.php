@extends('includes.app')

@section('content')

<form action="{{route('isstandard.store')}}" method="post">
{{csrf_field()}}
    <div class="form-group">
        <label for="value">Value:</label>
        <input type="text" class="form-control" id="value" name="value">
    </div>
    <div class="form-group">
        <label for="value">Sample:</label>
        <select class="form-control" name="sample_id">
            @if($samples->count() == 0)
            <p>Please add a sample first</p>
            @else
                @foreach($samples as $sample)
                    <option value="{{$sample->id}}">{{$sample->name}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

@endsection
