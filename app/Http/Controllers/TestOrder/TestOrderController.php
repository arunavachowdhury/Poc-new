<?php

namespace App\Http\Controllers\TestOrder;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestOrder;

use PDF;
use App\Review;

// use PDF;

class TestOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('testorder.index')->with(['testorders' => TestOrder::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testorder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiadtion = [
            'name' => 'required',
            'date' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];

        $this->validate($request, $valiadtion);

        $testOrder = TestOrder::create([
            'name' => $request->name,
            'date' => $request->date,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);
        $orderTestItems = collect($request->input('order_test_items_array'));
        $testOrder->orderTestItems()->attach($orderTestItems);

        return redirect()->route('testorder.show', ['id' => $testOrder->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testOrder = TestOrder::findOrFail($id);
        $testOrderItems = TestOrder::findOrFail($id)->orderTestItems;

        // return response()->json(['testOrder' => $testOrder, 'code' => 200]);

        return view('testorder.show')->with(['testOrder' => $testOrder, 'testOrderItems' => $testOrderItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     *
     */
    public function pdf($id)
    {
        $testOrder = TestOrder::findOrFail($id);
        $testOrderItems = TestOrder::findOrFail($id)->orderTestItems;

        $pdf = \App::make('dompdf.wrapper');
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $pdf->loadHTML($this->generatePdfContent($testOrder, $testOrderItems))->setPaper('a4');
        return $pdf->download("Test-Order-Form-{$id}");
    }

    public function generatePdfContent($testOrder, $testOrderItems)
    {
        $itemsTableCount = 1;
        $itemsTable = '';

        foreach ($testOrderItems as $testOrderItem) {
            $itemsTable .= '<tr><td>'.$itemsTableCount++.'</td><td>'.$testOrderItem['name'].'</td></tr>';
        }

        $output = '<!DOCTYPE html>
        <html lang="en" style="margin:0">
        <head>
          <title></title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
          <style>
            table, h1{
                text-align:center;
            }
            .table td {
                padding: 1px !important;
            }
          </style>
        </head>
        <body style="padding: 30px 50px">
        
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
            <div style="position:absolute; left: 85%;">
                <p style="margin-bottom:5px">Form No.</p>
                <p>Date :</p>
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
                We are sending herewith the sample of <span style="display:inline-block; border-bottom:1px solid black; padding-bottom:1px; padding-left: 30px; padding-right: 30px; margin-left:5px; margin-right:5px;">'.$testOrder['name'].'</span> marked
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
            <tbody>'
              .
              $itemsTable
              .
            '</tbody>
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
                </h6>
            </div>
            <br>
            <div class="row">
                <h6>
                    <b>Phone No.</b>
                </h6>
          </div>
        </div>
        
        </body>
        </html>
        ';
        return $output;
    }

    public function sentforreview($id)
    {
        $review = Review::create([
            'testorder_id' => $id,
        ]);

        return redirect()->route('review.show', ['id' => $review->id]);
    }
}
