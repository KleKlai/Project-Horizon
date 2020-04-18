<?php

namespace App\Http\Controllers\COS;

use App\Http\Controllers\Controller;
use App\Model\Record;
use Illuminate\Http\Request;
use App\Model\Attorney;
use App\Maynard\Maynard;

class Assigning extends Controller
{

    public function index()
    {
        // dd("Fetch Record Base on your column choices");

        $record = Record::select('uuid', 'control_no', 'status', 'status_color','source', 'department_region','deadline')
                            ->where('status', 'For Assignment')
                            ->orWhere('status', 'For Revision')
                            ->get();

        return view('component.cos.index', compact('record'));
    }

    public function assign(Request $request, Record $record)
    {
        $request->validate([
            'attorney'          =>  'required',
            'attorney_duedate'  =>  'required',
        ]);

        // dd($request);

        if(empty($record->attorney()->pluck('attorney_id')->first()))
        {
            // dd('empty');
            $attorney = Attorney::create([
                'record_id'     => $record->id,
                'attorney_id'   => $request->attorney,
                'due_date'      => $request->attorney_duedate,
            ]);

            $record->update([
                'status'        =>  'For Resolution',
                'status_color'  =>  'info',
            ]);

            Maynard::systemNotification($request->attorney, \Auth::user()->name, $record->control_no . ' has been assign to you.');
            \Session::flash('toastr_success', $record->control_no. ' has been assigned.');

        }
        else
        {
            $assign_attorney = Attorney::findOrFail($record->id);

            Maynard::systemNotification($assign_attorney->attorney_id, \Auth::user()->name, $record->control_no . ' has been reassigned.');

            $assign_attorney->update([
                'attorney_id'      =>  $request->attorney,
                'due_date'      =>  $request->attorney_duedate,
            ]);

            Maynard::systemNotification($request->attorney, \Auth::user()->name, $record->control_no . ' has been assign to you.');
            \Session::flash('toastr_success', $record->control_no. ' case has been reassigned.');
        }

        return back();
    }
}
