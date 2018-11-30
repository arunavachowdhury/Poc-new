<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Test;
use App\TestItem;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test.index')->with(['tests' => Test::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd($reviewed_order);
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Review $review)
    {
        // dd($request);
        $validation = [
            'date_of_receipt' => 'required',
            'sample_code_no' => 'required|integer',
            'company_name' => 'required',
            'sample_description' => 'required',
        ];
        $this->validate($request, $validation);

        $data = $request->all();

        // if ($request->has('remarks')) {
        //     $data['remarks'] = $request->remarks;
        // }

        $test = Test::create($data);
        $testItems = collect($request->input('test_items_array'));
        $test->testItems()->attach($testItems);

        return redirect()->route('test.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);
        $testItems = Test::findOrFail($id)->testItems;
        $users = User::all();

        // return response()->json(['testOrder' => $testOrder, 'code' => 200]);

        return view('test.show')->with(['test' => $test, 'testItems' => $testItems, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        return view('test.edit')->with(['test' => $test]);
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
        $test = Test::findOrFail($id);

        if ($request->has('result_recorded_on')) {
            $test->result_recorded_on = $request->result_recorded_on;
        }
        if ($request->has('delivery_date')) {
            $test->delivery_date = $request->delivery_date;
        }
        if ($request->has('mode')) {
            $test->mode = $request->mode;
        }
        if ($request->has('date_of_disposal')) {
            $test->date_of_disposal = $request->date_of_disposal;
        }
        if ($request->has('payment_details')) {
            $test->payment_details = $request->payment_details;
        }
        if ($request->has('remarks')) {
            $test->remarks = $request->remarks;
        }

        $test->save();

        return redirect()->route('test.index');
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
    public function registerTest($id)
    {
        $review = Review::findOrFail($id);
        $order = $review->testorder;
        $orderTestItems = $review->testorder->orderTestItems;

        // return $orderTestItems;
        
        return view('test.create')->with(['order' => $order, 'orderTestItems' => $orderTestItems]);
    }

    public function joballocate($id, Request $request)
    {
        $test = Test::findOrFail($id);
        $data = $request->user_id;
        $user = Auth::user()->id;
        $jobs = DB::table('test_user')->insert([
            'test_id' => $test->id,
            'user_id' => $data,
            'provider_id' => $user]);
        
        return redirect()->back();
        // dd($jobs);

        // $query = DB::table('users_job')->where('user_id', Auth::user()->id)->get();

        // $a = [];

        // foreach ($query as $q) {
        //     $qq = [
        //         'test_id' => $q->test_id
        //     ];
        //     array_push($a, $qq);
        // }

        // dd($a);


    }
}
