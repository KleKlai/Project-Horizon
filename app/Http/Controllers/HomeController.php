<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Activitylog\Models\Activity;
use App\Model\Record;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //If the current authenticated user has no permission of 'sys_admin_rights' send them back were do they belong.
        if(\Gate::denies('sys_admin_rights')){

            \Session::flash('swal_denied', 'You do not have enough access privileges for this page.');
            return back();
        }

        // Prompt user if they are still using the old password
        if(\Hash::check('bxtr1605', \Auth::user()->password)){
            \Session::flash('swal_change_password', 'This account is using the default password, it is strongly recommended that you change your password.');
        }

        $users_count = User::all()->count();
        $record_count = Record::all()->count();
        $verification_count = Record::where('status', 'For Review')->count();
        $done_count = Record::where('status', 'Done')->count();
        $activity_log = Activity::with('causer')->orderBy('id', 'desc')->take(9)->get();

        return view('home', compact(['activity_log', 'users_count', 'record_count','verification_count', 'done_count']));
    }

    public function profile(){
        //Change Password Index
        $user = User::findOrFail(\Auth::user()->id);

        return view('partials.profile', compact('user'));
    }

    public function newPassword(Request $request)
    {
        $request->validate([
            'password' => ['required','string','min:8','confirmed','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
        ],
        [
            'password.regex'    =>  'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.',
        ]);

        $user = User::findOrFail(\Auth::user()->id);

        if(\Hash::check($request->password, $user->password)){

            \Session::flash('toastr_warn', 'New password must be different from current password.');
            return back();
        } else {
            $user->update([
                'password' => \Hash::make($request->password),
            ]);

            \Session::flash('toastr_success', 'Password has been changed successfully.');

            return redirect()->route('logout');
        }
    }

    public function updateProfile(Request $request, User $user)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'unique:users,email,'. \Auth::user()->id,
            'profile'       => 'mimes:jpeg,bmp,png,max: 2000'
        ],
        [
            'profile.max'    => 'Your profile is too powerful. Max file size is 2mb please.'
        ]);


        if($request->hasFile('profile')){

            //Delete the old file first
            if($user->profile != 'default-avatar.png'){
                if(\Storage::exists('public/profile/'.$user->profile)){
                    \Storage::delete('public/profile/'.$user->profile);
                }else{
                    //if something went wrong during deletion process.
                    Session::flash('swal_error', 'Something went wrong. Could not update profile.');
                }
            }

            $filenameWithExt = $request->file('profile')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile')->getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'_'.$user->id.'.'.$extension;
            //Upload the file
            $path = $request->file('profile')->storeAs('public/profile', $fileNameToStore);
        }else{
            $fileNameToStore = $user->profile;
        }

        $user->update([
            'name'      => Ucwords($request->name),
            'email'     => $request->email,
            'profile'   => $fileNameToStore,
        ]);

        \Session::flash('toastr_success', 'Profile Updated Successfully.');

        return back();
    }
}
