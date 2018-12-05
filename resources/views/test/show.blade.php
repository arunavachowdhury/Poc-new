@extends('includes.app')

@section('content')

<h1>Test</h1>

<div style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px; margin-left: 20px">
    <div class="card">
    <div class="card-header card-header-primary"><h4 class="card-title ">Test</h4></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Date Of Receipt</td>
                    <td>{{$test->sample_received_on}}</td>
                </tr>
                <tr>
                    <td>Disposal Date</td>
                    <td>{{$test->date_of_disposal}}</td>
                </tr>
                <tr>
                    <td>Sample Reference No</td>
                    <td>{{$test->sample_reference_no}}</td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>{{$customer->name}}</td>
                </tr>
                <tr>
                    <td>Sample Name</td>
                    <td>{{$sample->name}}</td>
                </tr>
                <tr>
                    <td>Sample Description</td>
                    <td>{{$sample->description}}</td>
                </tr>
                <tr>
                    <td>Payment Details</td>
                    <td>{{$test->payment_details}}</td>
                </tr>
                <tr>
                    <td>Remarks</td>
                    <td>{{$test->remarks}}</td>
                </tr>
            </tbody>
    </div>
    </div>
    </table>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><b>Tests to be performed</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{$job->testItem->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection