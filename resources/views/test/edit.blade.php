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
                        <p class="card-category">Update Test information</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('test.update', ['id' => $test->id])}}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Result recorded on</label>
                                        <input type="date" class="form-control" name="result_recorded_on" value="{{$test->result_recorded_on}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Delivery Date</label>
                                        <input type="date" class="form-control" name="delivery_date" value="{{$test->delivery_date}}">
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
                                        <input type="date" class="form-control" name="date_of_disposal" value="{{$test->date_of_disposal}}">
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