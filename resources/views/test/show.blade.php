@extends('layouts.app')
@include('admin.sidebar')
@section('content')


<div style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px; margin-left: 20px">
    <div class="card">
    <div class="card-header card-header-primary"><h4 class="card-title ">Test</h4></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Date Of Receipt</td>
                    <td>{{$test->date_of_receipt}}</td>
                </tr>
                <tr>
                    <td>Sample Code no.</td>
                    <td>{{$test->sample_code_no}}</td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>{{$test->company_name}}</td>
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
                    <td>Result recorded on</td>
                    <td>{{$test->result_recorded_on}}</td>
                </tr>
                <tr>
                    <td>Delivery Date</td>
                    <td>{{$test->delivery_date}}</td>
                </tr>
                <tr>
                    <td>Delivery Mode</td>
                    <td>{{$test->mode}}</td>
                </tr>
                <tr>
                    <td>Date of Disposal</td>
                    <td>{{$test->date_of_disposal}}</td>
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
            @foreach($testItems as $testItem)
            <tr>
                <td>{{$testItem->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

   

    <div class="containr">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Allocate Job</h4>
                        <button class="btn" type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                    </div>
                    <div class="modal-body">
                        <form action="{{route('job.allocate', ['id' => $test->id])}}" method="post">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Select Employee or Technician</label>
                                        <select name = 'user_id' class="form-control">
                                            @foreach($users as $user)
                                            <option value =" {{ $user->id }}"> {{$user->name}} </option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn">Submit</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    <div style="position: absolute; top: 0px; left: calc(100% + 50px);">
        <a class="btn btn-success" href="{{route('test.edit', ['id' => $test->id])}}">Update information</a>
    </div>

    <div class="modal-footer" style="position: absolute; top: 90px; left: calc(100% + 50px);">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Allocate Job</button>
    </div>

    <div style="height:100px"></div>
</div>
@endsection