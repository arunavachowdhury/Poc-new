@extends('layouts.app')
@include('admin.sidebar')
@section('content')

<div class="cf" style="width: calc(95% - 220px); position:relative; border:1px solid #e2e2e2; padding:30px 0; margin-left: 20px">
    <h3 class="text-center"><b><u>TEST REPORT</u></b></h3>
    <table class="table">
        <tbody>
            <tr>
                <th>ULR: </th>
                <td>
                    <table>
                        <tr style="border: 1px solid #999; border-top: 1px solid #999;">
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">T</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">C</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">5</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">3</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">4</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">4</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">1</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">8</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">0</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">0</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">0</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">0</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">0</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">0</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">1</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">1</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">1</td>
                            <td style="border: 1px solid #999; border-top: 1px solid #999;">P</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <th>Test report no.</th>
                <td>: 02</td>
            </tr>
            <tr>
                <th>Customer name </th>
                <td>: Cloudhead Technologies</td>
            </tr>
            <tr>
                <th>Customer letter reference no.</th>
                <td>: 03</td>
            </tr>
            <tr>
                <th>Date of issue</th>
                <td>: 18-11-2018</td>
            </tr>
            <tr>
                <th>Customer reference no. </th>
                <td>: 06</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>: 25-11-2018</td>
            <tr>
                <th>Product/sample specification. </th>
                <td>: Water sample to test Arsenic and Iron amount</td>
            </tr>
            <tr>
                <th>Test required</th>
                <td>: Arsenic, Iron</td>
            <tr>
            <tr>
                <th>Date of receipt of sample</th>
                <td>: 19-11-2018</td>
            <tr>
            <tr>
                <th>Date of performance of test</th>
                <td>: 21-11-2018</td>
            <tr>
        </tbody>
    </table>
    <h3 class="text-center"><u>TEST RESULTS</u></h3>
    <p class="text-center">The sample has been tested with the following results:-</p>
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
                <td>11</td>
                <td>Marsh test</td>
            </tr>
            <tr>
                <td>02.</td>
                <td>Iron</td>
                <td>mg/L</td>
                <td>0.3</td>
                <td>0.6</td>
                <td>Strips test</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="pull-right" style="width: 425px">
        <h4><b>AGLOW QUALITY CONTROL LABORATORY PVT. LTD.</b></h4>
    <br>
    <br>
        <h4 class="text-center">(Authorized Signature)</h4>
    </div>



    <div style="position: absolute; top: 30px; left: calc(100% + 10px);">
        <a class="btn btn-success" href="" style="padding: 12px 20px">Save & Print report</a>
        <a class="btn btn-success" href="" style="padding: 12px 20px">Save report</a>
    </div>
</div>
</table>




@endsection
