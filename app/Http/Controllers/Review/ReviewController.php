<?php

namespace App\Http\Controllers\Review;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('review.index')->with(['reviews' => Review::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::findOrFail($id);

        $testOrder = $review->testOrder;
        $testOrderItems = $testOrder->orderTestItems;

        return view('review.show')->with([
            'testOrder' => $testOrder,
            'testOrderItems' => $testOrderItems,
            'status' => $review->status,
            'review_id' => $review->id
            ]);
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
        // dd($request);
        $validation = [
            'remarks' => 'required',
        ];

        $this->validate($request, $validation);

        $review = Review::findOrFail($id);

        if ($request->has('remarks')) {
            $review->remarks = $request->remarks;
        }
        if ($request->has('remarks')) {
            $review->status = $request->status;
        }

        $review->save();

        return redirect()->route('review.show', ['id'=> $review->id]);
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

    public function registerTest($id)
    {
        $review = Review::findOrFail($id);
        $order = $review->testorder;
        $orderTestItems = $review->testorder->orderTestItems;

        // return $orderTestItems;
        
        return view('test.create')->with(['order' => $order,
                                         'testOrderItems' => $orderTestItems,
                                         'review' => $review]);
    }
}
