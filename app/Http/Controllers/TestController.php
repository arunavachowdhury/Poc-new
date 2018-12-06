<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Sample;
use App\Test;
use Illuminate\Support\Facades\DB;
use App\TestItem;
use App\Job;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create')->with(['customers'=> Customer::all(), 'samples' => Sample::all(),'tests'=> Test::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'customer_id'=> 'required',
            'sample_id'=> 'required',
            'isstandard_id'=> 'required',
            'sample_received_on'=> 'required',  
            'sample_reference_no'=>'reruired',    
        ];
        $this->validate($request, $rules);

        $data = $request->all();

        $test = Test::create($data);
        
        // $testItems = DB::table('jobs');

        foreach ($request->test_items as $test_item) {
            $testItem = TestItem::findOrFail($test_item);

            $jobs = Job::create([
                'test_id' => $test->id,
                'test_item_id' => $test_item,
                'test_item_name' => $testItem->name,
                'specified_range_from' => $testItem->specified_range_from,
                'specified_range_to' => $testItem->specified_range_to,
                'is_new' => $testItem->is_new
            ]);
            // $jobs->test()->associate($test);
        }
        // dd($test);

        return redirect()->route('test.show', ['id' => $test->id]);
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
        $jobs = $test->jobs;
        $testItems = $test->jobs()->with('testItem')->get()->pluck('testItem');
        $sample = $test->sample;
        $customer = $test->customer;

        return view('test.show')->with(['test'=> $test,
                                        'jobs'=> $jobs,
                                        'sample'=> $sample,
                                        'customer'=> $customer]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('test.show')->with(['test'=> $test,
                                        'jobs'=> Job::all(),
                                        'samples'=> Sample::all(),
                                        'customers'=> Customer::all()]);
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
     * 
     */
    public function drafts() {
        $drafts = DB::table('tests')->where('status', 'draft')->orderBy('created_at', 'desc')->get();
        return view('test.drafts')->with(['drafts' => $drafts]);
    }

    /**
     * 
     * 
     */
    public function register($id) {
        $test = Test::findOrFail($id);
        if($test->status == 'draft' || $test->status == 'Draft') {
            $test->status = 'registered';
            $test->save();
        } else {
            redirect()->back();
        }
        return redirect()->route('test.show', ['id' => $test->id]);
    }
}
