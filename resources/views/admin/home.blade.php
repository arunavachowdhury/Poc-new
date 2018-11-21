@extends('layouts.app')

@include('admin.sidebar')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Test Order Form -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Test Order</p>
                        <!-- <h3 class="card-title">49/50
                        <small>GB</small>
                        </h3> -->
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="{{route('testorder.create')}}">Add Order</a>
                        </div>
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="{{route('testorder.index')}}">Order List</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Reviews</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="{{route('review.index')}}">Reviews Orders</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Job Allocation -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Tests</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="{{route('test.index')}}">Tests</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Internal test report -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Internal test report</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="{{route('test.report')}}">Internal test report</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Generate Test Report -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Generate Test Report</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="#pablo">Generate Test Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Employee Jobs -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervised_user_circle</i>
                        </div>
                        <p class="card-category">Employee Jobs</p>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">supervised_user_circle</i>
                            <a href="#pablo">Employee Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Employees Stats</h4>
                        <p class="card-category">New employees on 15th September, 2016</p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Salary</th>
                                    <th>Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

@endsection