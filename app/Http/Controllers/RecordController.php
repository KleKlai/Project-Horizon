<?php

namespace App\Http\Controllers;

use App\Model\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $record = Record::select('uuid', 'control_no', 'status', 'description')->get();

        return view('component.clerk.index', compact('record'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('component.clerk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'received_time'     =>  'required',
            'source'            =>  'required',
            'deadline'          =>  'required | numeric',
            'pages'             =>  'required | numeric',
            'document_type'     =>  'required',
            'department_region' =>  'required',
            'manner_of_receipt' =>  'required',
            'office_province'   =>  'required',
            'description'       =>  'required',
        ]);

        $request->request->add(['received_date' => date('F d, Y') ]);
        $request->request->add(['control_no' => mt_rand(1000000, 9999999)]);
        $request->request->add(['status' => 'NEW']);

        Record::create($request->all());

        \Session::flash('swal_success', 'Record encoded successfully.');

        return redirect(route('record.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        return view('component.clerk.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
