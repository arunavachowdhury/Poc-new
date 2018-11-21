@extends('layouts.app')

@include('admin.sidebar')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Jobs</h4>
                        <p class="card-category"> List of all jobs</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($tests as $test)
                                    <tr>
                                        <td>
                                            {{$test->id}}
                                            <a href="{{route('test.show', ['id' => $test->id])}}"> <i class="material-icons">info_outline</i></a>
                                        </td>
                                    </tr>    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection