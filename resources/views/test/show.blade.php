@extends('layouts.app')

@section('title')

{{$sample->name}} | {{$customer->name}}

@endsection

@section('content')

<div class="bgc-light-green-500 c-white p-20">
    <div class="peers ai-c jc-sb gap-40">
        <div class="peer peer-greed">
            <h1>{{$sample->name}} || {{$customer->name}}</h1>
        </div>
    </div>
</div>
<!-- <a href="{{route('sample.edit', ['sample' => $sample->id])}}" class="btn cur-p btn-primary">Edit Sample/Product</a> -->
<br>
<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Test details</h4>
            <div class="mT-30">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-action">
                        <b>Test status :</b>
                        <div style="display:inline; margin-left: 5px" class="peer">
                            @switch($test->status)
                                @case('draft')
                                    <a href="{{route('test.regsiter', ['id' => $test->id])}}" class="btn cur-p btn-warning">Draft copy, Click to regsiter</a>
                                @break
                                @case('registered')
                                    <a href="{{route('allocate.get', ['id' => $test->id])}}" class="btn cur-p btn-primary">Registered, allocate job</a>
                                @break
                                @case('in_progress')
                                    <a href="{{route('test.regsiter', ['id' => $test->id])}}" class="btn cur-p btn-primary">In Progress</a>
                                @break
                                @case('allocated')
                                    <a href="{{route('test.regsiter', ['id' => $test->id])}}" class="btn cur-p btn-secondary">Sent to Lab</a>
                                @break
                                @case('completed')
                                    <a href="{{route('test.regsiter', ['id' => $test->id])}}" class="btn cur-p btn-success">Completed</a>
                                @break                                    
                            @endswitch
                        </div>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <b>Customer/Comany name :</b> {{$customer->name}}
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <b>Product/Sample name:</b> {{$sample->name}}
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <b>Product/Sample desciption:</b> {{$sample->description}}
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <b>Sample recieved on:</b> {{$test->sample_received_on}}
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <b>Sample disposal date:</b> 
                    </li>
                    <!-- <li class="list-group-item list-group-item-action">
                        <b>Price: {{$test->price}} </b> 
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Specific Test Performed</h4>
            <div class="mT-30">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Test Item</th>
                            <th scope="col">Specified value range</th>
                            <th scope="col">Observed value</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->testItem->name}}</td>
                            <!-- <td></td> -->
                            <td>{{$job->specified_range_from}} {{$job->testItem->uom->unit}} - {{$job->specified_range_to}}
                            {{$job->testItem->uom->unit}}</td>
                            <td>
                                @if(!$job->obseved_value)
                                empty
                                @else
                                {{$job->obseved_value}}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
