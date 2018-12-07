<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Customer;
use App\Sample;
use App\Test;
use Illuminate\Support\Facades\DB;
use App\TestItem;
use App\Job;
use App\Lab;

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
        $customer = Customer::findOrFail($request->customer_id);
        $sample = Sample::findOrFail($request->sample_id);

        $validator = Validator::make($request->all(), [
            'customer_id'=> 'required',
            'sample_id'=> 'required',
            'isstandard_id'=> 'required',
            'sample_received_on'=> 'required',  
            'sample_reference_no'=>'reruired', 
        ]);

        $test = Test::create([
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
            'sample_id' => $sample->id,
            'sample_name' => $sample->name,
            'is_standard_id'=> $request->isstandard_id,
            'sample_received_on' => $request->sample_received_on,
            'sample_reference_no' => $request->sample_reference_no,
        ]);
        
        foreach ($request->test_items as $test_item) {
            $testItem = TestItem::findOrFail($test_item);

            $jobs = Job::create([
                'test_id' => $test->id,
                'test_item_id' => $test_item,
                'test_item_name' => $testItem->name,
                'specified_range_from' => $testItem->specified_range_from,
                'specified_range_to' => $testItem->specified_range_to,
                'price' => $testItem->price,
                'is_new' => $testItem->is_new
            ]);
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
        $isStandard = $test->isStandard;

        return view('test.show')->with(['test'=> $test,
                                        'jobs'=> $jobs,
                                        'sample'=> $sample,
                                        'customer'=> $customer,
                                        'isStandard'=> $isStandard]);

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

    public function registeredTests() {
        $registereds = DB::table('tests')->where('status', 'registered')->orderBy('created_at', 'desc')->get();
        return view('test.registereds')->with(['registereds' => $registereds]);
    }


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

    /**
     * 
     */
    public function allocateView($id) {
        $test = Test::findOrFail($id);
        $testJobs = DB::table('jobs')->where('test_id', $test->id)->get();
        return view('test.allocate')
        ->with(['test' => $test])
        ->with(['jobs' => $testJobs])
        ->with(['labs' => Lab::all()]);
    }

    /**
     * 
     */
    public function allocateAction(Request $request) {
        $test = Test::findOrFail($request->test_id);
        
        $jobs = $test->jobs;

        foreach ($jobs as $job) {
            DB::table('jobs')
            ->where('id', $job->id)
            ->update(['lab_id' => $request->lab_id, 'user_id' => $request->user_id]);
        }        
        $test->status = 'allocated';
        $test->save();
        return redirect()->route('test.show', ['id' => $test->id]);
    }

    /**
     * 
     */
    public function fillUpJobObservedValue(Request $request) {
        $validator = Validator::make($request->all(), [
            'job_id' => 'required',
            'modified_by' => 'required',
            'observed_value' => 'required'
        ]);

        DB::table('jobs')
            ->where('id', $request->job_id)
            ->update(['modified_by' => $request->modified_by, 'observed_value' => $request->observed_value]);

        $job = Job::findOrFail($request->job_id);

        return response()->json(['data' => $job]);
    }
}
