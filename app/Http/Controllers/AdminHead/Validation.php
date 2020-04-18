<?php

namespace App\Http\Controllers\AdminHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Record;
use App\Maynard\Maynard;
use App\Role;

class Validation extends Controller
{
    public function index()
    {
        // $record = Record::where('status', 'For Review')->get();

        $record = Record::with('attorney')->where('status', 'For Review')->get();

        return view('component.adminhead.index', compact('record'));
    }

    public function approved($id)
    {

        $record = Record::findOrFail($id);

        if(empty($record->attorney['id']))
        {
            \Session::flash('swal_info', 'Could not approved until no attorney is assigned.');
            return back();
        }

        if(empty($record->resolution['id']))
        {
            \Session::flash('swal_info', 'Could not approved until no resolution is submitted.');
            return back();
        }

        $record->update([
            'status'          =>  'Done',
            'status_color'    =>  'info',
        ]);

        \Session::flash('toastr_success', $record->control_no .' has been approved.');

        $user = Role::where('name', 'Chief of Staff')->first()->users()->get();

        foreach($user as $cos)
        {
            Maynard::systemNotification($cos->id, \Auth::user()->name , 'Approved resolution for '. $record->control_no);
        }

        return back();
    }

    public function disapproved(Request $request, $id)
    {
        $record = Record::findOrFail($id);

        if(empty($record->attorney['id']))
        {
            \Session::flash('swal_info', 'Could not disapproved until no attorney is assigned.');
            return back();
        }

        if(empty($record->resolution['id']))
        {
            \Session::flash('swal_info', 'Could not disapproved until no resolution is submitted.');
            return back();
        }

        $record->update([
            'status'                =>  'For Revision',
            'status_color'          =>  'danger',
            'disapproved_remark'    =>  $request->disapproved_remarks,
        ]);

        \Session::flash('toastr_warn', $record->control_no .' has been disapproved.');

        $user = Role::where('name', 'Chief of Staff')->first()->users()->get();

        foreach($user as $cos)
        {
            Maynard::systemNotification($cos->id, \Auth::user()->name , 'Disapproved resolution for '. $record->control_no);
        }

        return back();
    }
}
