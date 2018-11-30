@extends('layouts.app')
@include('admin.sidebar')
@section('content')

<div style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px 0; margin-left: 20px">
    <h3 class="text-center"><b><u>AGLOW QUALITY CONTROL LABORATORY PVT. LTD.</u></b></h3>
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Sample Code no.</td>
                        <td>01</td>
                    </tr>
                    <tr>
                        <td>Sample description</td>
                        <td>Water pollution is the ...</td>
                    </tr>
                    <tr>
                        <td>Testing required</td>
                        <td>Arsenic, Iron</td>
                    </tr>
                    <tr>
                        <td>Specification</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Sample recived on</td>
                        <td>16-11-2018</td>
                    </tr>
                    <tr>
                        <td>Sent to lab on</td>
                        <td>17-11-2018</td>
                    </tr>
                    <tr>
                        <td>Sample allocated to.</td>
                        <td>Lab1, Micheal Jenkins</td>
                    </tr>
                    <tr>
                        <td>Sample allocated by</td>
                        <td>Mrs. Shanelle Thiel</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <p class="text-center"><b>(To be filled up by Laboratory Technician)</b></p>
    <div class="row">
        <div class="col-sm-6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Date of Commencement of test:</td>
                        <td>18-11-2018</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Date of completion of test:</td>
                        <td>24-11-2018</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td><b>Sl no.</b></td>
                <td><b>Test item/job</b></td>
                <td><b>UOM(Unit of measurement)</b></td>
                <td><b>Observed value</b></td>
                <td><b>Specified value</b></td>
                <td><b>Test method</b></td>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <td>01.</td>
                <td>Arsenic</td>
                <td>ppb(parts per billion)</td>
                <td>13</td>
                <td><div class="form-group"><input type="text" class=""></div></td>
                <td>Marsh test</td>
            </tr>
            <tr>
                <td>02.</td>
                <td>Iron</td>
                <td>mg/L</td>
                <td>0.3</td>
                <td><div class="form-group"><input type="text" class=""></div></td>
                <td>Strips test</td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary pull-right" style="margin-right:15px">Save report</button>
    <br><br>

    <div style="position: absolute; top: 30px; left: calc(100% + 10px);">
        <a class="btn btn-success" href="" style="padding: 12px 20px">Generate internal report(PDF)</a>
        <!-- <a class="btn btn-success" href="" style="padding: 12px 20px">Fillup test values</a> -->
        <!-- <a class="btn btn-success" href="" style="padding: 12px 20px">Update information</a> -->
    </div>
</div>
</table>




@endsection
