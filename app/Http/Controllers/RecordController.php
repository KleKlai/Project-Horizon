<?php

namespace App\Http\Controllers;

use App\Model\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Prompt user if they are still using the old password
        if(\Hash::check('bxtr1605', \Auth::user()->password)){
            \Session::flash('swal_change_password', 'This account is using the default password, it is strongly recommended that you change your password.');
        }

        $record = Record::select('uuid', 'control_no', 'status', 'description')->get();
        // dd($record);

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
            'source'            =>  'required',
            'deadline'          =>  'required | numeric',
            'pages'             =>  'required | numeric',
            'document_type'     =>  'required',
            'department_region' =>  'required',
            'manner_of_receipt' =>  'required',
            'office_province'   =>  'required',
            'description'       =>  'required',
        ]);

        $request->request->add(['control_no' => mt_rand(1000000, 9999999)]);
        $request->request->add(['status' => 'NEW']);
        $request->request->add(['received_date' => date('F d, Y') ]);
        $request->request->add(['received_time' => date('h:i A') ]);

        Record::create($request->all());

        \Session::flash('toastr_success', 'Record encoded successfully.');

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
