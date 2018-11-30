@extends('layouts.app')

@include('admin.sidebar')

@section('content')

<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add remarks</h4>
                    <button class="btn" type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <form action="{{route('review.update', ['id' => $review->id])}}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Remarks</label>
                                    <textarea name="remarks" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="status" value="in_progress">
                        </div>
                        <button type="submit" class="btn">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Cancel modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Please add a remark before cancelling application</h4>
                    <button class="btn" type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <form action="{{route('review.update', ['id' => $review->id])}}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Remarks</label>
                                    <textarea name="remarks" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="_method" value="put">
                            <input type="hidden" name="status" value="rejected">
                        </div>
                        <button type="submit" class="btn">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<div style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px; margin-left: 20px">
    Status: 
    @switch($review->status)
    @case('draft')
    <span class="label label-warning">Draft</span>
    @break
    @case('in_progress')
    <span class="label label-primary">In progress</span>
    @break
    @case('rejected')
    <span class="label label-danger">Rejected</span>
    @break
    @case('approved')
    <span class="label label-success">Approved</span>
    @break
    @endswitch

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Test Order</h4>
                        <p class="card-category">Add a Test Order</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('test.store')}}" method="POST">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Date of Receipt</label>
                                        <input type="date" class="form-control" name="date_of_receipt" value="{{Carbon\Carbon::today()->toDateString()}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Sample Code no.</label>
                                        <input type="text" class="form-control" name="sample_code_no" value="{{$order->id}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="testOrderItem"> Select Items </label>
                                        @foreach ($testOrderItems as $testOrderItem)
                                        <div class="checkbox">
                                        <label><input type="checkbox" value="{{ $testOrderItem->id }}">{{ $testOrderItem->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Customer Name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{$order->company_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Sample Description</label>
                                        <textarea name="sample_description" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Lab</label>
                                        <select class="form-control" name="sample_sent_to_lab">
                                            <option value="lab1">Lab 1</option>
                                            <option value="lab2">Lab 2</option>
                                            <option value="lab3">Lab 3</option>
                                            <option value="lab4">Lab 4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Result recorded on</label>
                                        <input type="date" class="form-control" name="result_recorded_on">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Delivery Date</label>
                                        <input type="date" class="form-control" name="delivery_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Delivery mode</label>
                                        <select class="form-control" name="payment_details">
                                            <option value="actual">Actual Delivery</option>
                                            <option value="symbolic">Symbolic Delivery</option>
                                            <option value="constructive">Constructive Delivery</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Disposal Date</label>
                                        <input type="date" class="form-control" name="date_of_disposal">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="sel1">Payment method</label>
                                        <select class="form-control" name="payment_details">
                                            <option value="debit_credit_card">Debit/Credit Card</option>
                                            <option value="net_banking">Net Banking</option>
                                            <option value="cheque">Cheque</option>
                                            <option value="offline">Offline</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Remarks</label>
                                        <textarea name="remarks" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            @if($review->status != 'rejected')
                            <button type="submit" class="btn">Create new Test</button>
                            <div class="clearfix"></div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="position: absolute; top: 90px; left: calc(100% + 15px);">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Add remarks</button>
    </div>

    <div class="modal-footer" style="position: absolute; top: 165px; left: calc(100% + 15px);">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Reject application</button>
    </div>
    <div style="height:100px"></div>
</div>
    
</div>

@endsection