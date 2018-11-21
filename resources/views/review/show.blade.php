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
                    <form action="{{route('review.update', ['id' => $review_id])}}" method="post">
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
                    <form action="{{route('review.update', ['id' => $review_id])}}" method="post">
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
    @switch($status)
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
    <div class="text-center">
        <h1><u>Test Order Form</u></h1>
    </div>

    <br><br>

    <div class="container">
        <div class="row" style="height: 100px">
            <div class="col-lg-8">
                <div class="row">
                    <p>Ref. No.</p>
                </div>
            </div>
            <div style="position:absolute; left: 80%;">
                <p style="margin-bottom:5px">Form No. {{$testOrder->id}}</p>
                <p>Date : {{$testOrder->date}}</p>
            </div>
        </div>
        <div class="row">
            <p>
                To<br>
                Aglow Quality Control Laboratory Pvt. Ltd.<br>
                24A, Lake Road<br>
                Kolkata - 700 029
            </p>
        </div>
        <div class="row">
            <p>
                Dear Sir,<br>
                We are sending herewith the sample of <span style="display:inline-block; border-bottom:1px solid black; padding-bottom:1px; padding-left: 30px; padding-right: 30px; margin-left:5px; margin-right:5px;">{{$testOrder->name}}</span>
                marked
                ________________________ for testing the following items as per Specification No.
            </p>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">Sl.No.</th>
                        <th width="90%">Test Item</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $itemsTableCount = 1; ?>
                    @foreach ($testOrderItems as $testOrderItem)
                    <tr>
                        <td>
                            <?= $itemsTableCount++ ?>
                        </td>
                        <td>
                            {{$testOrderItem->name}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <p>
                Please test the above sample and issue the Test Report at the earliest. Necessary testing
                charge will be bourne by us.
            </p>
        </div>
        <div class="row">
            <p>
                Thanking you
            </p>
        </div>
        <div class="row">
            <p>
                Yours faithfully
            </p>
        </div>
        <div class="row">
            <h6>
                <b>Company Name & Address</b>
                <br>
                {{$testOrder->company_name}}
                <br>
                {{$testOrder->address}}
            </h6>
        </div>
        <br>
        <div class="row">
            <h6>
                <b>Phone No.</b>
                <br>
                {{$testOrder->phone}}
            </h6>
        </div>
    </div>


    @if($status != 'rejected')
    <div style="position: absolute; top: 30px; left: calc(100% + 30px);">
        <a class="btn btn-success" href="{{route('register.test', ['id' => $review_id])}}">Register Test</a>
    </div>
    @endif

    <div class="modal-footer" style="position: absolute; top: 90px; left: calc(100% + 15px);">
        <button type="button" class="btn" data-toggle="modal" data-target="#myModal">Add remarks</button>
    </div>

    <div class="modal-footer" style="position: absolute; top: 165px; left: calc(100% + 15px);">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal1">Reject application</button>
    </div>
    <div style="height:100px"></div>
</div>
@endsection