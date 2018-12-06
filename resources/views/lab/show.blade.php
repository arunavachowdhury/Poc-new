@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h2>Labarotory</h2>
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">Lab Name</div>
                    <div class="panel-body">{{$lab->name}}</div>
                </div>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-heading">Lab Address</div>
                    <div class="panel-body">{{$lab->address}}</div>
                </div>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-heading">Contact Person</div>
                    <div class="panel-body">{{$lab->contact_person}}</div>
                </div>
                <hr>
                <div class="panel panel-primary">
                    <div class="panel-heading">Phone Number</div>
                    <div class="panel-body">{{$lab->phone_number}}</div>
                </div>
                <hr>
                <!-- <table class="table">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>Mary</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                        </tr>
                    </tbody>
                </table> -->
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Technician</div>
                    <div class="panel-body">
                        <form action="{{route('allocate.user',['id'=> $lab->id])}}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="technician_id">Technician List:</label>
                                <select class="form-control" id="technician_id" name="technician_id">
                                    @foreach($technicians as $technician)
                                    <option value=" {{ $technician->id }}"> {{$technician->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
