<?php

namespace App\Http\Controllers;

use App\Model\Record;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Maynard\Maynard;

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

        $record = Record::select('uuid', 'control_no', 'status', 'status_color','description')->get();

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
            'received_date'     =>  'required',
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

        $request->request->add(['control_no' => mt_rand(1000000, 9999999)]);
        $request->request->add(['status' => 'For Assignment']);
        $request->request->add(['status_color' => 'success']);

        $record = Record::create($request->except('document'));

        foreach ($request->document as $data) {
            $record->addMedia(storage_path('tmp/uploads/' . $data))->toMediaCollection('document');
        }

        Maynard::getSession('toastr_success', 'Record encoded successfully.');

        $user = Role::where('name', 'Chief of Staff')->first()->users()->get();

        foreach($user as $cos)
        {
            Maynard::systemNotification($cos->id, 'New Record', \Auth::user()->name . ' added new record entry.');
        }

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
        $attorney = Role::where('name', 'Lawyer')->first()->users()->get();

        return view('component.clerk.show', compact(['record', 'attorney']));
    }

    public function media(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
