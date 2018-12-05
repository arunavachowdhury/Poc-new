@extends('layouts.app')

@section('content')
@if(Auth::user()->isUserAdmin())
<!-- Admin User -->
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item w-100">
        <div class="row gap-20">
            <!-- Unit of Measurement -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Unit of Measurement</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-primary">Add Unit of Measurement</button>
                                <br>
                                <br>
                                <a href="{{route('sample.index')}}" class="btn cur-p btn-success">Show list of Units</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample/Product -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Sample/Product</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-primary">Add Sample/Product</button>
                                <br>
                                <br>
                                <a href="{{route('sample.index')}}" class="btn cur-p btn-success">Show list of Sample/Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- IS Standards -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">IS Standards</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-primary">Add IS Standards for Sample/Product</button>
                                <br>
                                <br>
                                <button type="button" class="btn cur-p btn-primary">Edit Sample/Product Info</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Test Items -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Test Items</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-primary">Add Test Items</button>
                                <br>
                                <br>
                                <button type="button" class="btn cur-p btn-primary">Show Test details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Normal user -->
<div class="row gap-20 masonry pos-r">
    <div class="masonry-sizer col-md-6"></div>
    <div class="masonry-item w-100">
        <div class="row gap-20">
            <!-- Test -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Add a test</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-success">Customer already registered?</button>
                                <br>
                                <br>
                                <button type="button" class="btn cur-p btn-primary">New Customer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review test -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Test Review</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-success">Show review list</button>
                                <br>
                                <br>
                                <button type="button" class="btn cur-p btn-primary">demo button</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Jobs -->
            <div class="col-md-4">
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Jobs</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer">
                                <button type="button" class="btn cur-p btn-success">Assign a job</button>
                                <br>
                                <br>
                                <button type="button" class="btn cur-p btn-primary">See your jobs</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
