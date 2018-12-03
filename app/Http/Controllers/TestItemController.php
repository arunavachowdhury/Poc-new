<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;
use App\Uom;
use App\TestItem;

class TestItemController extends Controller
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
        return view('testitem.create')->with(['samples' => Sample::all()])->with(['uoms' => Uom::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required',
            'sample_id' => 'required',
            'isstandard_id' => 'required',
            'uom_id' => 'required',
            'specified_value' => 'required',
            'description' => 'required'
        ];

        $this->validate($request, $rule);

        // dd($request);

        $data = $request->all();

        // dd($data);

        $testItem = TestItem::create($data);

        return redirect()->route('sample.show', ['id' => $data['sample_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testItem = TestItem::findOrfail($id)->with('uom')->get();

        return response()->json(['data' => $testItem]);
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
