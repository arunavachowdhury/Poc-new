@extends('layouts.app')

@include('admin.sidebar')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Simple Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    @foreach ($testorders as $testorder)
                                    <tr>
                                        <td>
                                            {{$testorder->name}}
                                            <a href="{{route('testorder.show', ['id' => $testorder->id])}}"> <i class="material-icons">info_outline</i></a>
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