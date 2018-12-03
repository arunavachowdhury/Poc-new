@extends('includes.app')

@section('content')

<form action="{{route('testitem.store')}}" method="post">
{{csrf_field()}}
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="value">Sample:</label>
                <select class="form-control" id="sample_id" name="sample_id">
                    @if($samples->count() == 0)
                    <p>Please add a sample first</p>
                    @else
                        @foreach($samples as $sample)
                            <option value="{{$sample->id}}">{{$sample->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="value">ISStandards:</label>
                <select class="form-control" name="isstandard_id" id="isstandard_id">
                    <option value="" >Select IS Standard</option>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="value">Unit of measurment:</label>
                <select class="form-control" id="uom_id" name="uom_id">
                    @if($samples->count() == 0)
                    <p>Please add a Unit of measurment first</p>
                    @else
                        @foreach($uoms as $uom)
                            <option value="{{$uom->id}}">{{$uom->unit}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="specified_value">Specified value:</label>
                <input type="text" class="form-control" name="specified_value" id="specified_value">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Test Item name:</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="description">Test Item name:</label>
                <textarea name="description" id="description" rows="2" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#sample_id").change(function() {
                var value = $(this).val();

                $.get("http://127.0.0.1:8000/api/sample/" + value, function( data ) {
                    
                    var content = '';
                    $.each(data.data, function( index, value ) {
                        content += '<option value="'+value.id+'" >'+value.value+'</option>'
                    });
                    
                    // console.log(content);
                    
                    $( "#isstandard_id" ).html( content );
                    
                });
            });
            
        });
    </script>
@endpush