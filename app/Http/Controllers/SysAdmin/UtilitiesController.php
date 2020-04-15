<?php

namespace App\Http\Controllers\SysAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class UtilitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function activityLog()
    {
        $log = Activity::all();

        return view('component.admin.utilities.activity', compact('log'));
    }
}
