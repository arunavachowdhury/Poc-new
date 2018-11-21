@extends('layouts.app')

@include('admin.sidebar')

@section('content')

<div class="container">

</div>

<div style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px; margin-left: 20px">

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

    <div style="position: absolute; top: 30px; left: calc(100% + 30px);">
        <a class="btn btn-success" href="{{route('testorder.sentforreview', ['id' => $testOrder->id])}}">Send to review</a>
    </div>
</div>
@endsection