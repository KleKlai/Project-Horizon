<?php

namespace App\Http\Controllers\SysAdmin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Maynard\Maynard;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::distinct('id')->where('id', '!=', \Auth::user()->id)->get();

        return view('component.admin.usermanagement.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        return view('component.admin.usermanagement.create', compact('role'));
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
            'profile'   => ['mimes:jpeg,bmp,png,max: 2000'],
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'role'      => ['required'],
        ],
        [
            'profile.max'    => 'Your profile is too powerful. Max file size is 2mb please.'
        ]);

        if($request->hasFile('profile')){

            $fileNameToStore = Maynard::file($request, 2);

        }else{
            $fileNameToStore = 'default-avatar.png';
        }

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'profile'   => $fileNameToStore,
        ]);

        $user->roles()->attach($request->role);
        Maynard::getSession('toastr_success', $request->name . ' has been created successfully.');
        return redirect(route('users.index'));
    }

    public function edit(User $user)
    {
        $role = Role::all();
        return view('component.admin.usermanagement.edit', compact(['role', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'unique:users,email,'. $user->id,
            'profile'       => 'mimes:jpeg,bmp,png,max: 2000',
            'role'          => 'required',
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

            Maynard::file($request, 2);
        }else{
            $fileNameToStore = $user->profile;
        }

        $user->update([
            'name'      => Ucwords($request->name),
            'email'     => $request->email,
            'profile'   => $fileNameToStore,
        ]);

        $user->roles()->sync($request->role);

        Maynard::getSession('toastr_success', 'Profile Updated Successfully.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();

        $user->delete();

        Maynard::getSession('toastr_success', $user->name . ' deleted successfully');
        return back();
    }
}
