<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Record;
use Auth;
use App\Model\Attorney;
use App\Model\Resolution as submission;
use App\Maynard\Maynard;
use App\Role;

class Resolution extends Controller
{
    public function index()
    {

        if(Auth::user()->hasRole('System Adminstrator')){

            $record = Record::where('status', 'For Resolution')->get();

        } else {

            $record = Record::whereHas('attorney', function($q){$q->where('attorney_id', Auth::user()->id);})->get();

        }

        return view('component.lawyer.index', compact('record'));
    }

    public function submission(Request $request, $id)
    {
        $record = Record::findOrFail($id);

        $user = Role::where('name', 'Chief of Staff')->first()->users()->get();

        if(empty($record->attorney['id']))
        {
            Maynard::getSession('swal_info', 'Could not upload until no attorney is assigned.');
            return back();
        }

        $request->validate([
            'remarks'       =>  'required',
            'resolution'    =>  'required|max:10000|mimes:doc,docx',
        ]);

        if(!empty($record->resolution['id']))
        {
            if(\Storage::exists('public/resolution/'.$record->resolution['attachment'])){
                \Storage::delete('public/resolution/'.$record->resolution['attachment']);
            }else{
                Maynard::getSession('error', $record->resolution['attachment'] . ' doesnt exist.');
            }

        }

        $fileNameToStore = Maynard::file($request, 1);

        if(!empty($record->resolution['id']))
        {
            $resolution = submission::findOrFail($record->resolution['id']);

            $resolution->update([
                'user_id'       => Auth::user()->id,
                'attachment'    => $fileNameToStore,
                'remarks'       => $request->remarks,
            ]);

            foreach($user as $cos)
            {
                Maynard::systemNotification($cos->id, \Auth::user()->name, 'Resubmitted resolution for ' . $record->control_no);
            }

        } else {

            submission::create([
                'record_id'     => $id,
                'user_id'       => Auth::user()->id,
                'attachment'    => $fileNameToStore,
                'remarks'       => $request->remarks,
            ]);

            foreach($user as $cos)
            {
                Maynard::systemNotification($cos->id, \Auth::user()->name, 'Submitted resolution for ' . $record->control_no);
            }
        }

        $record->update([
            'submission'    =>  1,
            'status'        =>  'For Review',
            'status_color'  =>  'purple',
        ]);
        Maynard::getSession('toastr_success', 'Resolution submitted successfully.');
        return back();
    }

    public function download($id)
    {
        $resolution = submission::findOrFail($id);

        try{
            return response()->download(storage_path("app/public/resolution/{$resolution->attachment}"));

        } catch (\Exception  $e){
            Session::flash('error', $resolution->attachment . ' could not be downloaded.');
            return back();
        }
    }
}
