<?php

namespace App\Http\Controllers\TestReport;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TestReport;

class TestReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Test $testreport)
    {
        $query = DB::table('users_job')->where('user_id', Auth::user()->id)->get();

        $test = [];

        foreach ($query as $q) {
            $qq = [
                'test_id' => $q->test_id
            ];
            array_push($test, $q->test_id);
        }
        $tests = Test::findOrFail($test);
        return view('testreport.index')->with(['tests'=> $tests]);
            // $test = $testreport->user()->
            // dd($testreport->user);
        // if($testreport->user == Auth::user)
        // {
        //     return view('testreport.index')->with(['tests'=> $testreport]);
        // }
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
        
    $test = Test::findOrFail($id);
        // dd($test);
    return view('testreport.show')->with(['test'=> $test]);
        
        
        
        
        
        // $test = Test::findOrFail($id);
        // $data = DB::table('users_job')->where('test_id', $test->id)->get();
        // $user = $data->user_id;
        // $provider = $data->provider_id;

        
        // $query = DB::table('users_job')->where('user_id', Auth::user()->id)->get();

        // $a = [];

        // foreach ($query as $q) {
        //     $qq = [
        //         'test_id' => $q->test_id
        //     ];
        //     array_push($a, $qq);
        // }
        // dd($a);

        // return view('testreport.show')->with(['tests'=> $test, 'user'=> $user, 'provider' => $provider]);

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
}
