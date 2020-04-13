<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function password(){
        //Change Password Index
        return view('partials.profile');
    }

    public function newPassword(Request $requests)
    {
        $requests->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail(\Auth::user()->id);

        $user->update([
            'password' => Hash::make($requests->password),
        ]);

        \Session::flash('toastr_success', 'Password has been changed successfully.');

        return redirect()->route('logout');
    }
}
