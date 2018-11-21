@extends('layouts.app')
@include('admin.sidebar')
@section('content')


<div style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px; margin-left: 20px">
    <div class="card">
    <div class="card-header card-header-primary"><h4 class="card-title ">Internal Test Report</h4></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Sample Code no.</td>
                    <td>{{$test->sample_code_no}}</td>
                </tr>
                <tr>
                    <td>Testing Required</td>
                    <!-- <td>{{$test->testing_required}}</td> -->
                </tr>
                <tr>
                    <td>Sample Description</td>
                    <td>{{$test->sample_description}}</td>
                </tr>
               
                <tr>
                    <td>Sample sent to lab</td>
                    <td>{{$test->sample_sent_to_lab}}</td>
                </tr>
                <tr>
                    <td>Sample Received on</td>
                    <!-- <td>{{$test->sample_received__on}}</td> -->
                </tr>
                <tr>
                    <td>Sample Allocated By</td>
                    <!-- <td>{{$test->sample_allocated_by}}</td> -->
                </tr>
            </tbody>
    </div>
    </div>
    </table>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><b>Test Results</b></th>
            </tr>
        </thead>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">Sl.No.</th>
                        <th width="10%">Parameter</th>
                        <th width="10%">UOM</th>
                        <th width="10%">Observed Value</th>
                        <th width="10%">Specified Value</th>
                        <th width="10%">Test Method</th>
                    </tr>
                </thead>
            </table>
        </div>
    </table>




@endsection