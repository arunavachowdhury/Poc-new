@extends('layouts.app')

@include('admin.sidebar')

@section('content')

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
                                        <label class="bmd-label-floating">Add Jobs</label>
                                        <input type="text" class="form-control" id="itemName">
                                        <small style="color:slategrey">*Type Test Job name then press the Add Button</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Specified Value</label>
                                        <input type="text" class="form-control" id="specifiedValue">                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="button" class="btn" id="addTestItemButton">Add Job</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" id="addTestItem">
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" id="addOrderTestItem">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn">Create Test Order</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection